<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->delete();

        $types = array(
            ['type_id' => 1, 'description' => 'General'],
            ['type_id' => 2, 'description' => 'Child'],
        );

        // Uncomment the below to run the seeder
        DB::table('types')->insert($types);
    }
}
