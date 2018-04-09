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
        $fractal = $this->app->make('League\Fractal\Manager');
        $repo = m::mock('Matthewbdaly\LaravelRepositories\Repositories\Interfaces\AbstractRepositoryInterface');
        $repo->shouldReceive('all')->once()->andReturn([]);
        $transformer = m::mock('Matthewbdaly\Harmony\Transformers\BaseTransformer');
        $controller = new DummyController($fractal, $repo, $transformer);
        $response = $controller->getQueryset();
        $this->assertEquals([], $response);
    }

    public function testGetQuerysetById()
    {
        $fractal = $this->app->make('League\Fractal\Manager');
        $repo = m::mock('Matthewbdaly\LaravelRepositories\Repositories\Interfaces\AbstractRepositoryInterface');
        $repo->shouldReceive('findOrFail')->with(1)->once()->andReturn([]);
        $transformer = m::mock('Matthewbdaly\Harmony\Transformers\BaseTransformer');
        $controller = new DummyController($fractal, $repo, $transformer);
        $response = $controller->getQuerysetById(1);
        $this->assertEquals([], $response);
    }

    public function testInstantiateRepository()
    {
        $repo = m::mock('Matthewbdaly\LaravelRepositories\Repositories\Interfaces\AbstractRepositoryInterface');
        $repo->shouldReceive('findOrFail')->with(1)->once()->andReturn([]);
        $this->app->instance(
            'Matthewbdaly\LaravelRepositories\Repositories\Interfaces\AbstractRepositoryInterface',
            $repo
        );
        $fractal = $this->app->make('League\Fractal\Manager');
        $transformer = m::mock('Matthewbdaly\Harmony\Transformers\BaseTransformer');
        $controller = new DummyController($fractal, null, $transformer);
        $response = $controller->getQuerysetById(1);
        $this->assertEquals([], $response);
    }

    public function testInstantiateTransformer()
    {
        $fractal = $this->app->make('League\Fractal\Manager');
        $repo = m::mock('Matthewbdaly\LaravelRepositories\Repositories\Interfaces\AbstractRepositoryInterface');
        $repo->shouldReceive('all')->once()->andReturn([]);
        $transformer = m::mock('Matthewbdaly\Harmony\Transformers\BaseTransformer');
        $this->app->instance(
            'Matthewbdaly\Harmony\Transformers\BaseTransformer',
            $transformer
        );
        $controller = new DummyController($fractal, $repo);
        $response = $controller->getQueryset();
        $this->assertEquals([], $response);
    }
}
