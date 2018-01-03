<?php

namespace Matthewbdaly\Harmony\Http\Traits;

trait Delete
{
    /**
     * Delete an object by ID
     *
     * @param mixed $id The ID of the object to delete.
     * @return Illuminate\Http\Response
     */
    public function delete($id)
    {
        $item = $this->getQuerysetById($id);
        $item->delete();
        return json([], 204);
    }
}
