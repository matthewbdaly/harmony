<?php

namespace Tests\Unit\Http\Controllers;

use Matthewbdaly\Harmony\Http\Controllers\RestfulController;
use Matthewbdaly\Harmony\Http\Traits\{Delete, Index, Show, Store, Update};

class DummyController extends RestfulController
{
    use Delete, Index, Show, Store, Update;

    protected $repository = "Matthewbdaly\LaravelRepositories\Repositories\Interfaces\AbstractRepositoryInterface";

    protected $transformer = "Tests\Unit\Http\Controllers\DummyTransformer";

    protected $createRequest = "Illuminate\Http\Request";

    protected $updateRequest  = "Illuminate\Http\Request";
}
