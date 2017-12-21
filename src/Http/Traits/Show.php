<?php

namespace Matthewbdaly\Harmony\Http\Traits;

use League\Fractal\Resource\Item;

trait Show
{
    public function show($id)
    {
        $resource = new Item($this->getQuerysetById($id), new $this->transformer);
        $data = $this->fractal->createData($resource)->toArray();
        return response()->json($data);
    }
}
