<?php

namespace Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Mockery as m;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

class TestCase extends BaseTestCase
{
    use CreatesApplication, MockeryPHPUnitIntegration;

    public function assertParentHasTrait($trait, $class, $message = '')
    {
        $parent = get_parent_class($class);
        $traits = class_uses($parent);
        self::assertThat(in_array($trait, $traits), self::isTrue(), $message);
    }
}
