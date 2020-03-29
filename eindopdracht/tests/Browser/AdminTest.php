<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminTest extends DuskTestCase
{
    private function  LoginAdmin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'admin@admin')
                ->type('password', 'admin')
                ->press('Login');
        });
    }

    /**
     * A Dusk test to create a course.
     * @test
     * @return void
     */
    public function CreateCourse()
    {
        $this->LoginAdmin();
        $this->browse(function (Browser $browser) {
            $browser->visit('/course/create')
                    ->type('name','Databases 1')
                    ->type('omschrijving','Databases 1 is een vak waarbij de student kennis maakt met databases en de SQL syntax leert.')
                    ->type('studiepunten','4')
                    ->type('periode','1')
                    ->select('coordinator','Bart')
                    ->press('Toevoegen')
                    ->assertSee('Databases 1');
        });
    }

    /**
     * A Dusk test to create a teacher.
     * @test
     * @return void
     */
    public function CreateTeacher()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/teacher/create')
                ->type('name','Jasper')
                ->type('infix','van')
                ->type('lastname','Rosmalen')
                ->check('course_array[]','1')
                ->press('Toevoegen')
                ->assertSee('Jasper van Rosmalen');
        });
    }
}
