<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert(['tag' => 'makkelijk']);
        DB::table('tags')->insert(['tag' => 'moeilijk']);
        DB::table('tags')->insert(['tag' => 'veel werk']);
        DB::table('tags')->insert(['tag' => 'weinig werk']);
        DB::table('tags')->insert(['tag' => 'leuk']);
        DB::table('tags')->insert(['tag' => 'niet leuk']);
    }
}
