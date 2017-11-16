<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Mockery as m;

class RestfulControllerTest extends TestCase
{
    public function testTraits()
    {
        $controller = m::mock('Matthewbdaly\Harmony\Http\Controllers\RestfulController');
        $this->assertParentHasTrait('Illuminate\Foundation\Bus\DispatchesJobs', $controller);
        $this->assertParentHasTrait('Illuminate\Foundation\Validation\ValidatesRequests', $controller);
        $this->assertParentHasTrait('Illuminate\Foundation\Auth\Access\AuthorizesRequests', $controller);
    }

    public function testGetQueryset()
    {
        $repo = m::mock('Matthewbdaly\LaravelRepositories\Repositories\Interfaces\AbstractRepositoryInterface');
        $repo->shouldReceive('all')->once()->andReturn([]);
        $controller = new DummyController($repo);
        $response = $controller->getQueryset();
        $this->assertEquals([], $response);
    }

    public function testGetQuerysetById()
    {
        $repo = m::mock('Matthewbdaly\LaravelRepositories\Repositories\Interfaces\AbstractRepositoryInterface');
        $repo->shouldReceive('findOrFail')->with(1)->once()->andReturn([]);
        $controller = new DummyController($repo);
        $response = $controller->getQuerysetById(1);
        $this->assertEquals([], $response);
    }
}
