<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Fight;
use App\FightCategory;
use App\Player;
use App\Setting;
use App\ViewVote;
use App\Vote;
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
            'fight_category_id' => 'required',
            'player_1' => 'required',
            'player_2' => 'required'

        ]);

        $playerImage_1 = Player::where('id',$request->player_1)->first();
        $playerName_1 = $playerImage_1->name;
        $playerImage_1 = $playerImage_1->image;


        $playerImage_2 = Player::where('id',$request->player_2)->first();
        $playerName_2 = $playerImage_2->name;
        $playerImage_2 = $playerImage_2->image;



        $fight =  [
            'fight_name' => $playerName_1 . ' VS ' . $playerName_2,
            'playerImage_1' => $playerImage_1,
            'playerImage_2' => $playerImage_2,
            'fight_category_id' =>  $request->fight_category_id

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
    public function show($fightCategory, Fight $fight)
    {
        $fightCatName = FightCategory::where('id',$fight->fight_category_id)->first();
        $fightCatName = str_slug($fightCatName->fight_group_name,"-");

        $next_fight = Fight::where('fight_category_id',$fight->fight_category_id)->where('id', '>', $fight->id)->first();
        if ($next_fight){
            $next_fight = $next_fight->id;
        } else{
            $next_fight = 0;
        }

        $prv_fight = Fight::where('fight_category_id',$fight->fight_category_id)->where('id', '<', $fight->id)->orderBy('id', 'DESC')->first();
        if ($prv_fight){
            $prv_fight = $prv_fight->id;
        } else{
            $prv_fight = 0;
        }


        $cookie = ( request()->cookie(Str::slug($fight->fight_name,'-')))?: null;

        //  return $cookie;

        $fightWithPlayers = $fight->load(['players', 'comments' => function($c){
            $c->orderBy('id', 'desc')->paginate(10);
        }]);



        $top_fights = Fight::with('fightCategory')->take(5)->get();
        $top_votes = Fight::with('fightCategory')->orderBy('id','desc')->take(5)->get();

        $player_1 =  $fightWithPlayers->players[0]->id;
        $player_2 =  $fightWithPlayers->players[1]->id;

        $fight_votes = ViewVote::where('fight_id',$fight->id)->get();

        if ($fight_votes){
            $total_votes = 0;
            foreach ($fight_votes as $fight_vote){
                $total_votes = $total_votes + $fight_vote->voting;
            }

        }
//        return $total_votes;


        $votes_1 = ViewVote::where('fight_id',$fight->id)->where('player_id',$player_1)->first();
        if ($votes_1 == ''){
            $vote_1 = 0;
        } else{
            $vote_1 =  round(($votes_1->voting / $total_votes) * 100, 0);
        }
        $votes_2 = ViewVote::where('fight_id',$fight->id)->where('player_id',$player_2)->first();

        if ($votes_2 == ''){
            $vote_2 = 0;
        } else {
            $vote_2 = round(($votes_2->voting / $total_votes) * 100, 0);
        }

        //$votes= ViewVote::where('fight_id',$fight->id)->get();


        $comments = Comment::with('user')
            ->where('fight_id', $fight->id)
            ->orderByDesc('id')->paginate(10);
        // return  $fightWithPlayers;

        $settings = Setting::first();

        return view('fights.show', compact('fightWithPlayers', 'top_votes','top_fights','vote_1','vote_2','comments','cookie', 'next_fight', 'prv_fight','settings','fightCatName'));

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
            'fight_category_id' => 'required',
            'player_1' => 'sometimes',
            'player_2' => 'sometimes'

        ]);

        if ($request->player_1 == ''){
            $playerImage_1 = $fight->playerImage_1;
            $playerName_1 = Player::where('image',$fight->playerImage_1)->first();
            $playerName_1 = $playerName_1->name;
        } else {
            $playerImage_1 = Player::where('id',$request->player_1)->first();
            $playerName_1 = $playerImage_1->name;
            $playerImage_1 = $playerImage_1->image;
        }

        if ($request->player_2 == ''){
            $playerImage_2 = $fight->playerImage_2;
            $playerName_2 = Player::where('image',$fight->playerImage_2)->first();
            $playerName_2 = $playerName_2->name;
        } else {
            $playerImage_2 = Player::where('id',$request->player_2)->first();
            $playerName_2 = $playerImage_2->name;
            $playerImage_2 = $playerImage_2->image;
        }

        $fights =  [
            'fight_name' => $playerName_1 . ' VS ' . $playerName_2,
            'playerImage_1' => $playerImage_1,
            'playerImage_2' => $playerImage_2,
            'fight_category_id' =>  $request->fight_category_id

        ];

        $fight->update($fights);

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

        $voat_check = Vote::where('fight_id',$fight->id)->where('visitor_ip',$request->ip())->first();

        if($voat_check){
            //flash('You can vote once.')->success();
            return back();
        }

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

    public function getPlayers(Request $request){
        if($request->ajax()){
            $players = Player::where('fight_category_id',$request->fight_category_id)->pluck('name','id');
            $data = view('fights.getPlayers',compact('players'))->render();
            return response()->json(['options'=>$data]);
        }

    }
}
