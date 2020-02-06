<?php

namespace App\Http\Controllers;
use App\Suggestion;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i = 0;
        $suggestions = Suggestion::where('type','fight')->paginate(10);
        return view('suggestions.index', compact('suggestions','i'));
    }

    public function makeData()
    {
        $i = 0;
        $suggestions = Suggestion::where('type','new')->paginate(10);
        return view('suggestions.makeData', compact('suggestions','i'));
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
        $this->validate($request, [
            'type' => 'required',
            'player_one' => 'sometimes|max:255',
            'player_two' => 'sometimes|max:255',
            'description' => 'sometimes|max:255',
            'email' => 'sometimes|max:255',
            'problem' => 'sometimes|max:255'
        ]);

        $suggestion = new Suggestion();
        $suggestion->type = $request->type;
        $suggestion->player_one = $request->player_one;
        $suggestion->player_two = $request->player_two;
        $suggestion->description = $request->description;
        $suggestion->email = $request->email;
        $suggestion->problem = $request->problem;

        $suggestion->save();

        flash('Your suggestion was sent successfully')->success();

        return redirect()->route('fightCategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function show(Suggestion $suggestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function edit(Suggestion $suggestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suggestion $suggestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suggestion $suggestion)
    {
        //
    }



}
