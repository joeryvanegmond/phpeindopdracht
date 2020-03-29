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

        $teacher = new Teacher();
        $teacher->name = "Jasper";
        $teacher->infix = "van";
        $teacher->lastname = "Rosmalen";
        $teacher->save();



        //courses
        //periode 1
        DB::table('courses')->insert(['name'=>'Programmeren 1', 'omschrijving'=>'Lekker code stampen', 'studiepunten'=>'4', 'periode'=>'1', 'coordinator'=>'1']);
        DB::table('courses')->insert(['name'=>'Databases 1', 'omschrijving'=>'Kennis maken met Databases', 'studiepunten'=>'4', 'periode'=>'1', 'coordinator'=>'1']);

        //periode 2
        DB::table('courses')->insert(['name'=>'Programmeren 2', 'omschrijving'=>'Nog meer code stampen', 'studiepunten'=>'4', 'periode'=>'2', 'coordinator'=>'1']);
        DB::table('courses')->insert(['name'=>'Databases 2', 'omschrijving'=>'Voor echte databeesten', 'studiepunten'=>'3', 'periode'=>'2', 'coordinator'=>'1']);

        //periode 3
        DB::table('courses')->insert(['name'=>'Programmeren 3', 'omschrijving'=>'Het code stampen houd niet op', 'studiepunten'=>'4', 'periode'=>'3', 'coordinator'=>'1']);
        DB::table('courses')->insert(['name'=>'Software Management 1', 'omschrijving'=>'Hoe je requirements op moet stellen', 'studiepunten'=>'2', 'periode'=>'3', 'coordinator'=>'1']);

        //periode 4
        DB::table('courses')->insert(['name'=>'Programmeren 4', 'omschrijving'=>'We gaan weer code stampen', 'studiepunten'=>'2', 'periode'=>'4', 'coordinator'=>'1']);
        DB::table('courses')->insert(['name'=>'IT Service Management', 'omschrijving'=>'Hoe je in een bedrijf met software omgaat', 'studiepunten'=>'1', 'periode'=>'4', 'coordinator'=>'1']);

        //periode 5
        DB::table('courses')->insert(['name'=>'Programmeren 5', 'omschrijving'=>'Ook na de vakantie weer lekker code stampen', 'studiepunten'=>'3', 'periode'=>'5', 'coordinator'=>'1']);
        DB::table('courses')->insert(['name'=>'Modelleren 3', 'omschrijving'=>'Overerving is heel belangrijk', 'studiepunten'=>'2', 'periode'=>'5', 'coordinator'=>'1']);

        //periode 6
        DB::table('courses')->insert(['name'=>'Programmeren 6', 'omschrijving'=>'Lekker code stampen', 'studiepunten'=>'3', 'periode'=>'6', 'coordinator'=>'1']);
        DB::table('courses')->insert(['name'=>'Gesprekken', 'omschrijving'=>'Hoe je moet praten met elkaar', 'studiepunten'=>'1', 'periode'=>'6', 'coordinator'=>'1']);

        //periode 7
        DB::table('courses')->insert(['name'=>'Webs JavaScript', 'omschrijving'=>'Websites maken met JavaScript', 'studiepunten'=>'2', 'periode'=>'7', 'coordinator'=>'1']);
        DB::table('courses')->insert(['name'=>'Webs PHP', 'omschrijving'=>'Websites maken met PHP en Laravel', 'studiepunten'=>'3', 'periode'=>'7', 'coordinator'=>'1']);


        //Tasks
        DB::table('tests')->insert(['version'=>'2020-03-29', 'deadline'=>'2019-05-05 00:00:00', 'tag'=>'1', 'cijfer'=> '8', 'soort'=>'1', 'course_id'=>'1', 'completed'=>'1']);
        DB::table('tests')->insert(['version'=>'2020-03-29', 'deadline'=>'2019-04-02 00:00:00', 'tag'=>'5', 'cijfer'=> '7', 'soort'=>'1', 'course_id'=>'2', 'completed'=>'1']);
        DB::table('tests')->insert(['version'=>'2020-03-29', 'deadline'=>'2019-04-04 00:00:00', 'tag'=>'5', 'cijfer'=> '7', 'soort'=>'1', 'course_id'=>'3', 'completed'=>'1']);
        DB::table('tests')->insert(['version'=>'2020-03-29', 'deadline'=>'2019-07-08 00:00:00', 'tag'=>'5', 'cijfer'=> '6', 'soort'=>'1', 'course_id'=>'5', 'completed'=>'1']);
        DB::table('tests')->insert(['version'=>'2020-03-29', 'deadline'=>'2019-07-09 00:00:00', 'tag'=>'3', 'cijfer'=> '8', 'soort'=>'1', 'course_id'=>'6', 'completed'=>'1']);
        DB::table('tests')->insert(['version'=>'2020-03-29', 'deadline'=>'2019-04-05 00:00:00', 'tag'=>'1', 'cijfer'=> '6','soort'=>'1', 'course_id'=>'8', 'completed'=>'1']);
        DB::table('tests')->insert(['version'=>'2020-03-29', 'deadline'=>'2020-04-06 00:00:00', 'tag'=>'4', 'cijfer'=> '2','soort'=>'1', 'course_id'=>'4', 'completed'=>'1']);
        DB::table('tests')->insert(['version'=>'2020-03-29', 'deadline'=>'2020-04-07 00:00:00', 'tag'=>'2','soort'=>'1', 'course_id'=>'5', 'completed'=>'0']);
        DB::table('tests')->insert(['version'=>'2020-03-29', 'deadline'=>'2020-04-09 00:00:00', 'tag'=>'4','soort'=>'1', 'course_id'=>'9', 'completed'=>'0']);
        DB::table('tests')->insert(['version'=>'2020-03-29', 'deadline'=>'2020-04-14 00:00:00', 'tag'=>'3','soort'=>'1', 'course_id'=>'10', 'completed'=>'0']);

        DB::table('tests')->insert(['version'=>'2020-03-29', 'soort'=>'1', 'course_id'=>'11', 'completed'=>'0']);
        DB::table('tests')->insert(['version'=>'2020-03-29', 'soort'=>'1', 'course_id'=>'12', 'completed'=>'0']);
    }
}
