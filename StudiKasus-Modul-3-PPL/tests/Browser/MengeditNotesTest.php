<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MengeditNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group edit
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = \App\Models\User::find(1); 
            
            $browser->loginAs($user)
                ->visit('/notes') // visit halaman notes
                ->assertPathIs('/notes') // assert path url adalah /notes
                ->clickLink('Edit') // click link Edit
                ->assertPathIs('/edit-note-page/1')// assert path url adalah /edit-note-page/1
                ->type('title', 'user1sdadasasaaasads') // type TITLE
                ->type('description', 'user1sdadasasaa') // type DESCRIPTION
                ->press('UPDATE'); // press button UPDATE
        });
    }
}
