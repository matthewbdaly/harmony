<?php

namespace Tests\Unit\Http\Traits;

use Tests\TestCase;
use Mockery as m;

class IndexTest extends TestCase
{
    public function testTraits()
    {
        $mock = m::mock('Matthewbdaly\Harmony\Http\Traits\Index');
    }
}
