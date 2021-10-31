<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use App\User;

class HomepageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testHomepage()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                    ->type('email', 'translations@b2bwood.com')
                    ->type('password', 'b2bwood2021')
                    ->press('Login')
                    ->assertPathIs('/home');
        });
    }
}
