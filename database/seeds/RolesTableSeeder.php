<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        $roles = array(
            ['role_id' => 1, 'description' => 'Admin'],
            ['role_id' => 2, 'description' => 'User'],
        );

        // Uncomment the below to run the seeder
        DB::table('roles')->insert($roles);
    }
}
