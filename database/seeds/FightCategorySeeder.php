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

          ['fight_group_name' => 'Historical Figure'],
          ['fight_group_name' => 'Animal'],
          ['fight_group_name' => 'Combat Athletics'],
          ['fight_group_name' => 'Celebrities'],
          ['fight_group_name' => 'Tv-Movie Characters'],
          ['fight_group_name' => 'Game Characters'],
        ];

        foreach ($fightGroups as $fightGroup){

            \App\FightCategory::create($fightGroup);
        }
    }
}
