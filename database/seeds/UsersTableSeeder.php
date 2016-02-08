<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = array(
            [
            'login_id' => 'thuzar', 
            'user_name' => 'Thuzar',      
            'email' => 'thuzar@gmail.com',
            'password' => Hash::make('thuzar'),
            'role_id' => 1, 
            'created_at' => new DateTime, 
            'updated_at' => new DateTime],
        );

        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }
}
