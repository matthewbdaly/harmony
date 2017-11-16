<?php

namespace Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Mockery as m;

class TestCase extends BaseTestCase
{
    public function tearDown()
    {
        m::close();
        parent::tearDown();
    }

    public function assertParentHasTrait($trait, $class, $message = '')
    {
        $parent = get_parent_class($class);
        $traits = class_uses($parent);
        self::assertThat(in_array($trait, $traits), self::isTrue(), $message);
    }
}
