<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(User::count()==0)
        {
        	$user = new User;
        	$user->name = "Master";
        	$user->is_admin = true;
        	$user->email = "master@root.com";
        	$user->password = Hash::make("drmaster");
        	$user->save();


        }
    }
}
