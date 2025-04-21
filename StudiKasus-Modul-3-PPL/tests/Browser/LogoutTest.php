<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogoutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group logout
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = \App\Models\User::find(1); 
            
            $browser->loginAs($user)
                ->visit('/notes') // visit halaman notes
                ->assertPathIs('/notes') // assert path url adalah /notes
                ->click('@user-dropdown') // klik dropdown user
                ->click('@logout-button') // klik tombol logout
                ->assertPathIs('/');
        });
    }
}
