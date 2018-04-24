<?php

namespace Tests\Unit\Http\Traits;

use Tests\TestCase;
use Mockery as m;
use Tests\Unit\Http\Controllers\DummyController;
use Illuminate\Http\Request;

class DeleteTest extends TestCase
{
    public function testHasTrait()
    {
        $controller = m::mock('Tests\Unit\Http\Controllers\DummyController');
        $this->assertParentHasTrait('Matthewbdaly\Harmony\Http\Traits\Delete', $controller);
    }

    public function testDelete()
    {
        $fractal = $this->app->make('League\Fractal\Manager');
        $model = m::mock('Illuminate\Database\Eloquent\Model');
        $model->shouldReceive('delete')->once();
        $repo = m::mock('Matthewbdaly\LaravelRepositories\Repositories\Interfaces\AbstractRepositoryInterface');
        $repo->shouldReceive('findOrFail')->with(1)->once()->andReturn($model);
        $request = Request::create('http://example.com', 'DELETE');
        $controller = new DummyController($fractal, $repo);
        $response = $controller->delete($request, 1); 
        $this->assertEquals(204, $response->getStatusCode());
    }
}
