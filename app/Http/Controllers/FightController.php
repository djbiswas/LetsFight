<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Fight;
use App\FightCategory;
use App\Player;
use App\ViewVote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class FightController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $i = 0;
        $fightWithPlayers = Fight::with('fightCategory')->with('players')->paginate(10);

        //return $fightWithPlayers;
        //return $fightWithPlayers[0]->players[0];

        return view('fights.index',compact('fightWithPlayers','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $players = Player::pluck('name','id');
        $fight_categories = FightCategory::pluck('fight_group_name','id') ;
        return view('fights.create',compact('fight_categories','players'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'fight_name' => 'required',
            'fight_category_id' => 'required',
            'player_1' => 'required',
            'player_2' => 'required',
            'fight_banner' => 'image|mimes:jpg,jpeg,png,gif'

        ]);

        if ($request->hasFile('fight_banner')) {
            //get image file.
            $image = $request->fight_banner;
            //get just extension.
            $ext = $image->getClientOriginalExtension();
            //make a unique name
            $filename = uniqid() . '.' . $ext;

            //delete the previous image.
//            if(File::exists(public_path($player->image))){
//                File::delete(public_path($player->image));
//            }
            //upload the image
            $request->fight_banner->move(public_path('images'), $filename);

        }

        $fight =  [
            'fight_name' => $request->fight_name,
            'fight_category_id' =>  $request->fight_category_id,
            'fight_banner' =>  'images/'.$filename

        ];

        $match= Fight::create($fight);

        $player = [$request->player_1,$request->player_2];
        $match->players()->attach($player);

        flash('Fight Just Start')->success();
        return redirect()->route('fights.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fight  $fight
     * @return \Illuminate\Http\Response
     */
    public function show(Fight $fight)
    {


        $cookie = ( request()->cookie(Str::slug($fight->fight_name,'-')))?: null;

        //  return $cookie;

        $fightWithPlayers = $fight->load(['players', 'comments' => function($c){
            $c->orderBy('id', 'desc')->paginate(10);
        }]);

        $top_fights = Fight::take(5)->get();
        $top_votes = Fight::orderBy('id','desc')->take(5)->get();

        $player_1 =  $fightWithPlayers->players[0]->id;
        $player_2 =  $fightWithPlayers->players[1]->id;

        $votes_1 = ViewVote::where('fight_id',$fight->id)->where('player_id',$player_1)->first();
        if ($votes_1 == ''){
            $vote_1 = 0;
        } else{
            $vote_1 = $votes_1->voting;
        }
        $votes_2 = ViewVote::where('fight_id',$fight->id)->where('player_id',$player_2)->first();

        if ($votes_2 == ''){
            $vote_2 = 2;
        } else {
            $vote_2 = $votes_2->voting;
        }

        //$votes= ViewVote::where('fight_id',$fight->id)->get();

        $comments = Comment::with('user')
            ->where('fight_id', $fight->id)
            ->orderByDesc('id')->paginate(10);
        // return  $fightWithPlayers;
        return view('fights.show', compact('fightWithPlayers', 'top_votes','top_fights','vote_1','vote_2','comments','cookie'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fight  $fight
     * @return \Illuminate\Http\Response
     */
    public function edit(Fight $fight)
    {

        $fightPlayers = $fight::where('id',$fight->id)->with('players')->first();

        $players = Player::pluck('name','id');
        $fight_categories = FightCategory::pluck('fight_group_name','id');
        return view('fights.edit',compact('fight','fight_categories','players','fightPlayers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fight  $fight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fight $fight)
    {
        $this->validate($request, [
            'fight_name' => 'required',
            'fight_category_id' => 'required',
            'player_1' => 'sometimes',
            'player_2' => 'sometimes',
            'fight_banner' => 'sometimes|image|mimes:jpg,jpeg,png,gif'

        ]);



        if ($request->hasFile('fight_banner')) {
            //get image file.
            $image = $request->fight_banner;
            //get just extension.
            $ext = $image->getClientOriginalExtension();
            //make a unique name
            $filename = uniqid() . '.' . $ext;

//            delete the previous image.
            if(File::exists(public_path($fight->fight_banner))){
                File::delete(public_path($fight->fight_banner));
            }
            //upload the image
            $request->fight_banner->move(public_path('images'), $filename);

            $fights =  [

                'fight_name' => $request->fight_name,
                'fight_category_id' =>  $request->fight_category_id,
                'fight_banner' =>  'images/'.$filename

            ];
        } else {
            $fights =  [

                'fight_name' => $request->fight_name,
                'fight_category_id' =>  $request->fight_category_id

            ];
        }

        //$fight->update($fights);

        $fightPlayers = $fight::where('id',$fight->id)->with('players')->first();

        if ($request->player_1){
            $player_1 = $request->player_1;
        }else{

            $player_1 = $fightPlayers->players[0]->id;
        }

        if ($request->player_2){
            $player_2 = $request->player_2;
        }else {
            $player_2 = $fightPlayers->players[1]->id;
        }


        $player = [$player_1, $player_2];




        $fight->players()->sync($player);

        flash('Fight Updated')->success();
        return redirect()->route('fights.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fight  $fight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fight $fight)
    {
        $fight->delete();
        flash('Fight Delete Success')->success();
        return redirect()->route('fights.index');
    }

    public function addVote(Request $request, Fight $fight, $player){

        $cookieName= Str::slug($fight->fight_name,'-') ;
        $client_ip = $request->ip();
        $vote = $request->merge(['visitor_ip' => $client_ip, 'player_id' => $player])->all();

        $addVote= $fight->votes()->create($vote);

        return back()->cookie($cookieName, $client_ip, 525600);
    }

    public function addComment(Request $request, Fight $fight){


     $newComment = $fight->comments()
         ->create($request->merge(
             ['user_id' => auth()->id()])->all()
         );
        return redirect()->back();
    }
}
