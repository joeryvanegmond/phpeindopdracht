<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DashboardTest extends DuskTestCase
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
     * A Dusk test example.
     * @test
     * @return void
     */
    public function GradeInDashboard()
    {

        $this->loginAdmin();
        $this->browse(function (Browser $browser) {
            $browser->visit('/test/edit/7')
                ->type('cijfer','10')
                ->press('Wijzigen')
                ->visit('/')
                ->assertsee('10');
        });
    }
}
