<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LiveWireTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function  testLiveWireMount(){
        $this->actingAs(User::findOrFail(14));
        $this->get("/home")->assertSeeLivewire('edit-company-description');
        $this->get("/home")->assertSeeLivewire('edit-company-address');
        $this->get("/home")->assertSeeLivewire('edit-company-name');
        $this->get("/home")->assertSeeLivewire('edit-company-employee');

    }
}
