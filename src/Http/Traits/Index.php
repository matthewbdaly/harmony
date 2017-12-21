<?php

namespace Matthewbdaly\Harmony\Http\Traits;

use League\Fractal\Resource\Collection;

trait Index
{
    public function index()
    {
        $resource = new Collection($this->getQueryset(), new $this->transformer);
        $data = $this->fractal->createData($resource)->toArray();
        return response()->json($data);
    }
}
