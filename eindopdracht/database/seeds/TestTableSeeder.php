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
        DB::table('courses')->insert(['name'=>'php', 'omschrijving'=>'heel leuk vak']);
        DB::table('tests')->insert(['id'=>'1', 'version'=>'2019-03-23', 'cijfer'=>'6']);
    }
}
