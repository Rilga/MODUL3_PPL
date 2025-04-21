<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MenampilkanNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group show
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = \App\Models\User::find(1); 
            
            $browser->loginAs($user)
                ->visit('/notes') // visit halaman notes
                ->assertPathIs('/notes') // assert path url adalah /notes
                ->assertSee('Author'); // assert ada tulisan Author
        });
    }
}
