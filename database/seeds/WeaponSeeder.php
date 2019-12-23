<?php

use Illuminate\Database\Seeder;

class WeaponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $weapons = [
            ['name' => 'none'],
            ['name' => 'Swords'],
            ['name' => 'Fighting knives and daggers'],
            ['name' => 'Blunt staves'],
            ['name' => 'Throwing sticks'],
        ];

        foreach ( $weapons as $weapon){
            \App\Weapon::create($weapon);
        }
    }
}
