<?php

namespace Matthewbdaly\Harmony\Http\Traits;

use League\Fractal\Resource\Item;

trait Show
{
    protected function getShowData()
    {
        $resource = new Item($this->getQuerysetById($id), new $this->transformer);
        return $this->fractal->createData($resource);
    }

    public function show($id)
    {
        $request = request();
        $data = $this->getShowData();
        if ($request->ajax()) {
            return response()->json($data->toArray());
        } else {
            return view('harmony::base', ['data' => $data->toJson()]);
        }
    }
}
