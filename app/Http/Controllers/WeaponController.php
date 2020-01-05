<?php

namespace App\Http\Controllers;

use App\Weapon;
use Illuminate\Http\Request;

class WeaponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i = 0;
        $weapons = Weapon::paginate(10);
        return view('weapons.index', compact('weapons','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('weapons.create');
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
            'name' => 'required',
            'weapon_description' => 'sometimes|max:255'
        ]);

        $weapon = new Weapon();
        $weapon->name = $request->name;
        $weapon->weapon_description = $request->weapon_description;


        $weapon->save();

        flash('New Weapon Add Sussess')->success();

        return redirect()->route('weapons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Weapon  $weapon
     * @return \Illuminate\Http\Response
     */
    public function show(Weapon $weapon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Weapon  $weapon
     * @return \Illuminate\Http\Response
     */
    public function edit(Weapon $weapon)
    {
        return view('weapons.edit',compact('weapon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Weapon  $weapon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Weapon $weapon)
    {
        $this->validate($request, [
            'name' => 'required',
            'weapon_description' => 'sometimes|max:255'
        ]);

        $weapon_data = Weapon::find($weapon->id);
        $weapon_data->name = $request->name;
        $weapon_data->weapon_description = $request->weapon_description;


        $weapon_data->save();

        flash('Weapon Update Sussess')->success();

        return redirect()->route('weapons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Weapon  $weapon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Weapon $weapon)
    {
        //
    }
}
