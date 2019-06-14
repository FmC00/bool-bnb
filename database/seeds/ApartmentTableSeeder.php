<?php

use Illuminate\Database\Seeder;

use App\Apartment;

class ApartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Apartment::class, 30)->make()->each(function ($apartment){

        $user = App\User::inRandomOrder()->first();
        $apartment->user()->associate($user);
        $apartment->save();

        });
    }    
}
