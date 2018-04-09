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
}
