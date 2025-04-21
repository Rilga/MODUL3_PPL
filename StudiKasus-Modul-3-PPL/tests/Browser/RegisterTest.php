<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // visit page home
                    ->assertSee('Modul') // assert melihat page memiliki tulisan modul
                    ->clickLink('Register') // click link register
                    ->assertPathIs('/register') // assert path url adalah /register
                    ->type('name', 'User') // type name
                    ->type('email', 'User@gmail.com') // type email
                    ->type('password', 'user12345') // type password
                    ->type('password_confirmation', 'user12345') // type password confirmation
                    ->press('REGISTER'); // press button register
        });
    }
}
