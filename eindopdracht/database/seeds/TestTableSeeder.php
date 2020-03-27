<?php

use Illuminate\Database\Seeder;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert(['name'=>'php', 'omschrijving'=>'heel leuk vak', 'studiepunten'=>'4', 'periode'=>'7']);
    }
}
