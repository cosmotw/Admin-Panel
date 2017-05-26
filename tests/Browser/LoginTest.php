<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class LoginTest extends DuskTestCase
{
    /**
     * Test login page.
     *
     * @return void
     */
    public function testLoginPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Login Form');
        });
    }

    /**
     * Test login action.
     *
     * @return void
     */
    public function testLoginAction()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                    ->type('email', 'guest@guest.com')
                    ->type('password', 'EY5QmVsSUxfBb6Vc')
                    ->press('Log in')
                    ->assertPathIs('/home');
        });
    }
}
