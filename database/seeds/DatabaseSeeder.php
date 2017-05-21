<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('events')->insert([
          'name' => 'sport',
          'description' => 'football match ',
          'address' => 'alex gleem '
        ]);
        DB::table('events')->insert([
          'name' => 'art',
          'description' => 'draw  ',
          'address' => 'alex sedy gaber '
        ]);
        DB::table('events')->insert([
          'name' => 'running',
          'description' => 'running ',
          'address' => 'alex mandara '
        ]);
    }
}
