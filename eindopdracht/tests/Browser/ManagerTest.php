<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ManagerTest extends DuskTestCase
{
    private function  LoginManager()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'manager@manager')
                ->type('password', 'manager')
                ->press('Login');
        });
    }


    /**
     * A Dusk test to set deadline.
     * @test
     * @return void
     */
    public function SetDeadline()
    {
        $this->loginManager();
        $this->browse(function (Browser $browser) {
            $browser->visit('/manager/edit/7')
                ->type('deadline', '08042020')
                ->select('tag', 'moeilijk')
                ->assertInputValueIsNot('deadline', '2020-04-11T00:00')
                ->press('Opslaan');
        });
    }

    /**
     * A Dusk test to check a deadline.
     * @test
     * @return void
     */
    public function FinishDeadline()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/manager')
                ->check('completed','7')
                ->assertSee('Databases 1');
        });
    }
}
