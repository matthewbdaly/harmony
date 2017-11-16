<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Mockery as m;

class RestfulControllerTest extends TestCase
{
    public function testTraits()
    {
        $controller = m::mock('Matthewbdaly\Harmony\Http\Controllers\RestfulController')->makePartial();
        $this->assertParentHasTrait('Illuminate\Foundation\Bus\DispatchesJobs', $controller);
        $this->assertParentHasTrait('Illuminate\Foundation\Validation\ValidatesRequests', $controller);
        $this->assertParentHasTrait('Illuminate\Foundation\Auth\Access\AuthorizesRequests', $controller);
    }
}
