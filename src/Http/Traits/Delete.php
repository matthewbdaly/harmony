<?php

namespace Matthewbdaly\Harmony\Http\Traits;

use League\Fractal\Resource\Collection;
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
        $resource = new Collection([], $this->transformer);
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
        $this->repository->delete($id);
        return $this->renderResponse($this->getDeletedData(), 204);
    }
}
