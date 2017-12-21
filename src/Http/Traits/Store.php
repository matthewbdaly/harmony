<?php

namespace Matthewbdaly\Harmony\Http\Traits;

use Illuminate\Http\Request;

trait Store
{
    public function store(Request $request)
    {
        return $this->getQueryset();
    }
}
