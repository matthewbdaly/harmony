<?php

namespace Matthewbdaly\Harmony\Http\Traits;

use Illuminate\Http\Request;

trait Update
{
    public function update(Request $request, $id)
    {
        $request = app()->make($this->editRequest);
        $item = $this->getQuerysetById($id);
        $item->update($request->all());
        return json($item, 200);
    }
}
