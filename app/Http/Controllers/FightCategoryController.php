<?php

namespace App\Http\Controllers;

use App\FightCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        $this->validate($request, [
            'fight_group_name' => 'required',
            'category_image' => 'image|mimes:jpg,jpeg,png,gif',
            'group_note' => 'sometimes|max:255'
        ]);

        $fightCategory = new FightCategory();
        $fightCategory->fight_group_name = $request->fight_group_name;
        $fightCategory->group_note = $request->group_note;


        if ($request->hasFile('category_image')) {
            //get image file.
            $image = $request->category_image;
            //get just extension.
            $ext = $image->getClientOriginalExtension();
            //make a unique name
            $filename = uniqid() . '.' . $ext;

            //delete the previous image.
//            if(File::exists(public_path($player->image))){
//                File::delete(public_path($player->image));
//            }
            //upload the image
            $request->category_image->move(public_path('images'), $filename);

        }

        $fightCategory->save();

        flash('New Category Add Sussess')->success();

        return redirect()->route('fightCategory.list');
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

//         return $fightsCat;

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
        return view('fightCategory.edit', compact('fightCategory'));
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
        $this->validate($request, [
            'fight_group_name' => 'required',
            'category_image' => 'image|mimes:jpg,jpeg,png,gif',
            'group_note' => 'sometimes|max:255'
        ]);

        $fightCategory = FightCategory::find($fightCategory->id);
        $fightCategory->fight_group_name = $request->fight_group_name;
        $fightCategory->group_note = $request->group_note;



        if ($request->hasFile('category_image')) {
            //get image file.
            $image = $request->category_image;
            //get just extension.
            $ext = $image->getClientOriginalExtension();
            //make a unique name
            $filename = uniqid() . '.' . $ext;


            //delete the previous image.
            if(File::exists(public_path($fightCategory->category_image))){
                File::delete(public_path($fightCategory->category_image));
            }
            //upload the image
            $request->category_image->move(public_path('images'), $filename);
            //this column has a default value so don't need to set it empty.
            $fightCategory->category_image = 'images/'.$filename;

        }

        $fightCategory->save();

        flash('New Category Add Success')->success();

        return redirect()->route('fightCategory.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FightCategory  $fightCategory
     * @return \Illuminate\Http\Response
     */

    public function destroy(FightCategory $fightCategory)
    {
        $fightCategory->delete();
        flash('Category Delete Success')->success();
        return redirect()->route('fightCategory.index');
    }

    public function list(){
        $i=0;
        $fightCategories = FightCategory::orderBy('fight_group_name','asc')->paginate(10);
        return view('fightCategory.list', compact('fightCategories','i')) ;
    }
}
