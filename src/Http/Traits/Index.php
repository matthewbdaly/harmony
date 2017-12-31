<?php

namespace Matthewbdaly\Harmony\Http\Traits;

use League\Fractal\Resource\Collection;

trait Index
{
    protected function getIndexData()
    {
        $resource = new Collection($this->getQueryset(), new $this->transformer);
        return $this->fractal->createData($resource)->toArray();
    }

    public function index()
    {
        $request = request();
        $data = $this->getIndexData();
        if ($request->ajax()) {
            return response()->json($data);
        } else {
            return view('harmony::base', ['data' => $data->toJson()]);
        }
    }
}
