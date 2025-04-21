<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MembuatNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group create
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = \App\Models\User::find(1); 
            
            $browser->loginAs($user)
                ->visit('/notes') // visit halaman notes
                ->assertPathIs('/notes') // assert path url adalah /notes
                ->clickLink('Create Note') // click link Create
                ->assertPathIs('/create-note')// assert path url adalah /create-note
                ->type('title', 'Userasasdasss') // type TITLE
                ->type('description', 'user1sdadasasssss') // type DESCRIPTION
                ->press('CREATE'); // press button CREATE
        });
    }
}
