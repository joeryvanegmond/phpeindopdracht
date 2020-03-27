<?php

use Illuminate\Database\Seeder;
use App\Teacher;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher = new Teacher();
        $teacher->name = "Ger";
        $teacher->infix = "van";
        $teacher->lastname = "Saris";
        $teacher->save();

        DB::table('courses')->insert(['name'=>'Java', 'omschrijving'=>'De basis van programmeren??', 'studiepunten'=>'4', 'periode'=>'3', 'coordinator'=>'1']);
        $teacher->courses()->attach(1);

        $teacher = new Teacher();
        $teacher->name = "Bart";
        $teacher->infix = "van";
        $teacher->lastname = "Gelens";
        $teacher->save();

        DB::table('courses')->insert(['name'=>'Databases 4', 'omschrijving'=>'Oei oei wat leuk', 'studiepunten'=>'3', 'periode'=>'8', 'coordinator'=>'2']);
        $teacher->courses()->attach(2);



    }
}
