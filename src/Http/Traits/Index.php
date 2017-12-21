<?php

namespace Matthewbdaly\Harmony\Http\Traits;

trait Index
{
    public function index()
    {
        return response()->json($this->getQueryset());
    }
}
