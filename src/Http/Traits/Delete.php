<?php

namespace Matthewbdaly\Harmony\Http\Traits;

trait Delete
{
    public function delete($id)
    {
        $item = $this->getQuerysetById($id);
        $item->delete();
        return json([], 204);
    }
}
