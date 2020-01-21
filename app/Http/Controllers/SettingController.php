<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::where('id','1')->first();
        return view('settings.index', compact('settings'));
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
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'keywords' => 'required',
            'facebook' => 'sometimes',
            'twitter' => 'sometimes',
            'instagram' => 'sometimes',
            'ads1' => 'sometimes',
            'ads2' => 'sometimes',
            'ads3' => 'sometimes'
        ]);

        $settings = Setting::find(1);
        $settings->title = $request->title;
        $settings->description = $request->description;
        $settings->keywords = $request->keywords;
        $settings->facebook = $request->facebook;
        $settings->twitter = $request->twitter;
        $settings->instagram = $request->instagram;
        $settings->ads1 = $request->ads1;
        $settings->ads2 = $request->ads2;
        $settings->ads3 = $request->ads3;


        $settings->save();

        flash('Settings Update Success')->success();

        return redirect()->route('settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
