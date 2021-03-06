<?php

use Illuminate\Database\Seeder;

use App\Message;
use App\User;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Message::class, 100)->make()->each(function ($message){

        $user = User::inRandomOrder()->first();
        $message->user()->associate($user);
        $message->save();

        });
    }
}
