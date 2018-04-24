<?php

namespace Tests\Unit\Http\Traits;

use Tests\TestCase;
use Mockery as m;
use Tests\Unit\Http\Controllers\DummyController;

class ShowTest extends TestCase
{
    public function testHasTrait()
    {
        $controller = m::mock('Tests\Unit\Http\Controllers\DummyController');
        $this->assertParentHasTrait('Matthewbdaly\Harmony\Http\Traits\Show', $controller);
    }

    public function testShow()
    {
        $fractal = $this->app->make('League\Fractal\Manager');
        $repo = m::mock('Matthewbdaly\LaravelRepositories\Repositories\Interfaces\AbstractRepositoryInterface');
        $model = m::mock('Illuminate\Database\Eloquent\Model');
        $model->shouldReceive('getAttribute')->with('id')->once()->andReturn(1);
        $repo->shouldReceive('findOrFail')->with(1)->once()->andReturn($model);
        $controller = new DummyController($fractal, $repo);
        $response = $controller->show(1); 
        $this->assertEquals(200, $response->getStatusCode());
    }
}
