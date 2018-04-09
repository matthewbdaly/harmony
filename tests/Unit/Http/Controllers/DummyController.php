<?php

namespace Tests\Unit\Http\Controllers;

use Matthewbdaly\Harmony\Http\Controllers\RestfulController;
use Matthewbdaly\Harmony\Http\Traits\{Delete, Index, Show, Store, Update};

class DummyController extends RestfulController
{
    use Delete, Index, Show, Store, Update;
}
