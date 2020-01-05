<?php

use Illuminate\Database\Seeder;

class FightCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fightGroups = [

          ['fight_group_name' => 'Historical Figure','category_image' => 'Historical-Figure.jpg'],
          ['fight_group_name' => 'Animal','category_image' => 'animals-fight.jpg'],
          ['fight_group_name' => 'Combat Athletics','category_image' => 'Combat-Athletics.jpg'],
          ['fight_group_name' => 'Celebrities','category_image' => 'Celebrities.jpg'],
          ['fight_group_name' => 'Tv-Movie Characters','category_image' => 'Tv-Movie-Characters.jpg'],
          ['fight_group_name' => 'Game Characters','category_image' => 'game-characters.jpg'],
        ];

        foreach ($fightGroups as $fightGroup){
            \App\FightCategory::create($fightGroup);
        }
    }
}
