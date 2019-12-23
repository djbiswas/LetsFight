<?php

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
        $fights = [
           [ 'fight_name' => null]
        ];

        foreach ( $fights as $fight){

            \App\Fight::create($fight);
        }
    }
}
