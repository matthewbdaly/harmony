<?php

namespace Matthewbdaly\Harmony\Http\Traits;

use League\Fractal\Resource\Collection;

trait Index
{
    protected function getIndexData()
    {
        $resource = new Collection($this->getQueryset(), new $this->transformer);
        return $this->fractal->createData($resource);
    }

    public function index()
    {
        return $this->renderResponse($this->getIndexData());
    }
}
