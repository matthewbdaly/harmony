<?php

namespace Matthewbdaly\Harmony\Http\Traits;

trait Show
{
    public function show($id)
    {
        return response()->json($this->getQuerysetById($id));
    }
}
