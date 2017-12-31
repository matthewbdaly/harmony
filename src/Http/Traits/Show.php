<?php

namespace Matthewbdaly\Harmony\Http\Traits;

use League\Fractal\Resource\Item;

trait Show
{
    public function show($id)
    {
        $resource = new Item($this->getQuerysetById($id), new $this->transformer);
        $data = $this->fractal->createData($resource)->toArray();
        if ($request->ajax()) {
            return response()->json($data);
        } else {
            return view('harmony::base', ['data' => $data]);
        }
    }
}
