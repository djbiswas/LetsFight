<?php

namespace App\Http\Controllers;

use App\Player;
use App\Weapon;
use App\FightCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i = 0;
        $players = Player::paginate(10);
        //return $players;
        return view('players.index', compact('players','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = FightCategory::pluck('fight_group_name','id');
        $weapons = Weapon::pluck('name', 'id');
        return view('players.create', compact('weapons','categories'));
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
            'Height' => 'sometimes',
            'weight' => 'sometimes',
            'age' => 'sometimes',
            'from' => 'sometimes',
            'size' => 'sometimes',
            'continent' => 'sometimes',
            'area' => 'sometimes',
            'speed' => 'sometimes',
            'attacks' => 'sometimes',
            'years' => 'sometimes',
            'role' => 'sometimes',
            'sport' => 'sometimes',
            'record' => 'sometimes',
            'shows' => 'sometimes',
            'game' => 'sometimes',
            'debut' => 'sometimes',
            'type' => 'sometimes',
            'identity' => 'sometimes',
            'fight_category_id' => 'sometimes',
            'weapon_id' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,gif'
        ]);

        $player = new Player();
        $player->name = $request->name;
        $player->Height = $request->Height;
        $player->weight = $request->weight;
        $player->age = $request->age;
        $player->from = $request->from;
        $player->size = $request->size;
        $player->continent = $request->continent;
        $player->area = $request->area;
        $player->speed = $request->speed;
        $player->attacks = $request->attacks;
        $player->years = $request->years;
        $player->role = $request->role;
        $player->sport = $request->sport;
        $player->record = $request->record;
        $player->shows = $request->shows;
        $player->game = $request->game;
        $player->debut = $request->debut;
        $player->type = $request->type;
        $player->identity = $request->identity;
        $player->fight_category_id = $request->fight_category_id;
        $player->weapon_id = $request->weapon_id;



        if ($request->hasFile('image')) {
            //get image file.
            $image = $request->image;
            //get just extension.
            $ext = $image->getClientOriginalExtension();
            //make a unique name
            $filename = uniqid() . '.' . $ext;

            //delete the previous image.
//             Storage::delete("images/{$projectVerified->image}");

            //upload the image
            $request->image->move(public_path('images'), $filename);

            //this column has a default value so don't need to set it empty.
            $player->image = 'images/'.$filename;
        }


        $player->save();

        flash('New Player Add Success')->success();

        return redirect()->route('players.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        $weapons = Weapon::pluck('name', 'id');
        return view('players.edit',compact('player','weapons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        //return $request->all();

        $this->validate($request, [
            'name' => 'required',
            'Height' => 'sometimes',
            'weight' => 'sometimes',
            'age' => 'sometimes',
            'from' => 'sometimes',
            'size' => 'sometimes',
            'continent' => 'sometimes',
            'area' => 'sometimes',
            'speed' => 'sometimes',
            'attacks' => 'sometimes',
            'years' => 'sometimes',
            'role' => 'sometimes',
            'sport' => 'sometimes',
            'record' => 'sometimes',
            'shows' => 'sometimes',
            'game' => 'sometimes',
            'debut' => 'sometimes',
            'type' => 'sometimes',
            'identity' => 'sometimes',
            'fight_category_id' => 'sometimes',
            'weapon_id' => 'required',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png,gif'
        ]);

        $player = Player::find($player->id);
        $player->name = $request->name;
        $player->Height = $request->Height;
        $player->weight = $request->weight;
        $player->age = $request->age;
        $player->from = $request->from;
        $player->size = $request->size;
        $player->continent = $request->continent;
        $player->area = $request->area;
        $player->speed = $request->speed;
        $player->attacks = $request->attacks;
        $player->years = $request->years;
        $player->role = $request->role;
        $player->sport = $request->sport;
        $player->record = $request->record;
        $player->shows = $request->shows;
        $player->game = $request->game;
        $player->debut = $request->debut;
        $player->type = $request->type;
        $player->identity = $request->identity;
        $player->fight_category_id = $request->fight_category_id;
        $player->weapon_id = $request->weapon_id;

        if ($request->hasFile('image')) {
            //get image file.
            $image = $request->image;
            //get just extension.
            $ext = $image->getClientOriginalExtension();
            //make a unique name
            $filename = uniqid() . '.' . $ext;

            //delete the previous image.
            if(File::exists(public_path($player->image))){
                File::delete(public_path($player->image));
            }
            //upload the image
            $request->image->move(public_path('images'), $filename);
            //this column has a default value so don't need to set it empty.
            $player->image = 'images/'.$filename;
        }


        $player->save();

        flash('Player Update Success')->success();

        return redirect()->route('players.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $player->delete();
        flash('Player Delete Success')->success();
        return redirect()->route('players.index');
    }
}
