<?php

namespace Matthewbdaly\Harmony\Http\Traits;

use League\Fractal\Resource\Collection;

trait Index
{
    /**
     * Get data for objects
     *
     * @return League\Fractal\Scope
     */
    protected function getIndexData()
    {
        $resource = new Collection($this->getQueryset(), $this->transformer);
        return $this->fractal->createData($resource);
    }

    /**
     * Get object
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->renderResponse($this->getIndexData());
    }
}
