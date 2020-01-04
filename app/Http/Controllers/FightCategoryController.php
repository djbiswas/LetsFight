<?php

namespace App\Http\Controllers;

use App\FightCategory;
use Illuminate\Http\Request;

class FightCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fightCategories = FightCategory::all();
      //  return $fightCategories;

        return view('welcome',compact('fightCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fightCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FightCategory  $fightCategory
     * @return \Illuminate\Http\Response
     */
    public function show($fightCategory)
    {
        $fightsCat = FightCategory::with('fights')->find($fightCategory);
     //   return $fightsCat;
       return  view('fightCategory.show', compact('fightsCat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FightCategory  $fightCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(FightCategory $fightCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FightCategory  $fightCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FightCategory $fightCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FightCategory  $fightCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(FightCategory $fightCategory)
    {
        //
    }
    public function list(){
        $i=0;
        $fightCategories = FightCategory::orderBy('fight_group_name','asc')->paginate(10);
        return view('fightCategory.list', compact('fightCategories','i')) ;
    }
}
