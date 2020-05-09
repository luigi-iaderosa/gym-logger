<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create(['name'=>'luigi_fake','email'=>'luigi@fakemail.org']);
        factory(User::class)->create(['name'=>'gym_owner','email'=>'owner@gym.org']);
    }
}
