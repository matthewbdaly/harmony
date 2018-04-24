<?php

namespace Matthewbdaly\Harmony\Http\Traits;

use League\Fractal\Resource\Item;
use Illuminate\Http\Request;

trait Delete
{
    /**
     * Get deleted data response
     *
     * @return League\Fractal\Scope
     */
    protected function getDeletedData()
    {
        $resource = new Item([], $this->transformer);
        return $this->fractal->createData($resource);
    }

    /**
     * Delete an object by ID
     *
     * @param Request $request The request object.
     * @param mixed $id The ID of the object to delete.
     * @return Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $item = $this->getQuerysetById($id);
        $item->delete();
        return $this->renderResponse($this->getDeletedData(), 204);
    }
}
