<?php

namespace Matthewbdaly\Harmony\Http\Traits;

use League\Fractal\Resource\Item;

trait Show
{
    /**
     * Get data for object
     *
     * @param mixed $id The ID of the object to delete.
     * @return League\Fractal\Scope
     */
    protected function getShowData($id)
    {
        $resource = new Item($this->getQuerysetById($id), new $this->transformer);
        return $this->fractal->createData($resource);
    }

    /**
     * Get object
     *
     * @param mixed $id The ID of the object to delete.
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->renderResponse($this->getShowData($id));
    }
}
