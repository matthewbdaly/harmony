<?php

namespace Matthewbdaly\Harmony\Http\Traits;

use Illuminate\Http\Request;

trait Update
{
    /**
     * Update the object
     *
     * @param Request $request The request object.
     * @param mixed   $id      The ID of the object to delete.
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request = app()->make($this->editRequest);
        $item = $this->getQuerysetById($id);
        $item->update($request->all());
        return json($item, 200);
    }
}
