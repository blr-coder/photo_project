<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Developer',
                'email' => '05011989e@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$YfJmKHXfCQGk0jcSYsElX.Wyr57LfXTXmuKOhf4b9un36otQGyK0G',
                'role' => 'superAdmin',
                'remember_token' => NULL,
                'created_at' => '2020-04-26 12:34:36',
                'updated_at' => '2020-04-26 12:34:36',
            ),
        ));
        
        
    }
}