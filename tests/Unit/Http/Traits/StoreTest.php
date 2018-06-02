<?php

namespace Tests\Unit\Http\Traits;

use Tests\TestCase;
use Mockery as m;
use Tests\Unit\Http\Controllers\DummyController;
use Illuminate\Http\Request;

class StoreTest extends TestCase
{
    public function testHasTrait()
    {
        $controller = m::mock('Tests\Unit\Http\Controllers\DummyController');
        $this->assertParentHasTrait('Matthewbdaly\Harmony\Http\Traits\Store', $controller);
    }

    public function testStore()
    {
        $request = new Request();
        $this->app->instance('Illuminate\Http\Request', $request);
        $fractal = $this->app->make('League\Fractal\Manager');
        $model = m::mock('Illuminate\Database\Eloquent\Model');
        $model->shouldReceive('toJson')->once()->andReturn();
        $repo = m::mock('Matthewbdaly\LaravelRepositories\Repositories\Interfaces\AbstractRepositoryInterface');
        $repo->shouldReceive('create')->once()->andReturn($model);
        $controller = new DummyController($fractal, $repo);
        $response = $controller->store($request);
        $this->assertEquals(201, $response->getStatusCode());
    }
}
