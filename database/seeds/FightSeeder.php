<?php

use App\Fight;
use App\FightCategory;
use App\Player;
use Illuminate\Database\Seeder;

class FightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $players = Player::all()->chunk(2)
            ->mapSpread(function($item1, $item2){
                return [ 'id' => [$item1->id, $item2->id],
                            'name' => [$item1->name, $item2->name] ]; })
                        ->toArray();

        $fightCategories= FightCategory::all();


        foreach ($players as $player){
          $fight=  [
              'fight_name' => implode(' VS ', $player['name']),
              'fight_categories_id' =>  $fightCategories->random()->id

                ];

            $match= Fight::create($fight);
            $match->players()->attach($player['id']);
        }


    }
}
