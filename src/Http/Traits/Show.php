<?php

namespace Matthewbdaly\Harmony\Http\Traits;

trait Show
{
    public function show($id)
    {
        return $this->getQuerysetById($id);
    }
}
