<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Fight;
use App\ViewVote;
use Illuminate\Http\Request;

class FightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fight  $fight
     * @return \Illuminate\Http\Response
     */
    public function show(Fight $fight)
    {
        $fightWithPlayers = $fight->load(['players', 'comments' => function($c){
                $c->orderBy('id', 'desc')->paginate(10);
        }]);

        $votes= ViewVote::where('fight_id',$fight->id)->get();
        $comments = Comment::with('user')
            ->where('fight_id', $fight->id)
            ->orderByDesc('id')->paginate(10);
      // return  $fightWithPlayers;
       return view('fights.show', compact('fightWithPlayers', 'votes','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fight  $fight
     * @return \Illuminate\Http\Response
     */
    public function edit(Fight $fight)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fight  $fight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fight $fight)
    {
        //
    }

    public function addVote(Request $request, Fight $fight, $player){

        $vote = $request->merge(['visitor_ip' => $request->ip(), 'player_id' => $player])->all();

        $addVote= $fight->votes()->create($vote);
        return back();
    }

    public function addComment(Request $request, Fight $fight){


     $newComment = $fight->comments()
         ->create($request->merge(
             ['user_id' => auth()->id()])->all()
         );
        return redirect()->back();
    }
}
