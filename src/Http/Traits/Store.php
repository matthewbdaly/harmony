<?php

namespace Matthewbdaly\Harmony\Http\Traits;

use Illuminate\Http\Request;

trait Store
{
    public function store()
    {
        $request = app()->make($this->createRequest);
        return response()->json($this->repository->create($request->all()));
    }
}
