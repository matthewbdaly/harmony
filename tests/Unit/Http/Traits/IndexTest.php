<?php

namespace Tests\Unit\Http\Traits;

use Tests\TestCase;
use Mockery as m;
use Tests\Unit\Http\Controllers\DummyController;

class IndexTest extends TestCase
{
    public function testHasTrait()
    {
        $controller = m::mock('Tests\Unit\Http\Controllers\DummyController');
        $this->assertParentHasTrait('Matthewbdaly\Harmony\Http\Traits\Index', $controller);
    }

    public function testIndex()
    {
        $fractal = $this->app->make('League\Fractal\Manager');
        $repo = m::mock('Matthewbdaly\LaravelRepositories\Repositories\Interfaces\AbstractRepositoryInterface');
        $repo->shouldReceive('all')->once()->andReturn([]);
        $controller = new DummyController($fractal, $repo);
        $response = $controller->index(); 
        $this->assertEquals(200, $response->getStatusCode());
    }
}
