<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RoleSeeder::class);
        factory(\App\User::class)->create(['email' => 'admin@lara6.test'])->each(
            function ($user){ $user->roles()->attach(['1']);}
        );
         factory(\App\User::class, 50)->create()->each(
             function ($user){ $user->roles()->attach(['2']);}
         );

        $this->call(WeaponSeeder::class);
        factory(\App\Player::class, 50)->create();

        $this->call(FightCategorySeeder::class);
        $this->call(FightSeeder::class);
        factory(\App\Vote::class, 5000)->create();
        factory( \App\Comment::class, 500 )->create();


    }
}
