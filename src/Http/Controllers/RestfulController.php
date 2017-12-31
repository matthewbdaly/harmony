<?php

namespace Matthewbdaly\Harmony\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Matthewbdaly\LaravelRepositories\Repositories\Interfaces\AbstractRepositoryInterface;
use League\Fractal\Manager;
use League\Fractal\Scope;

abstract class RestfulController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(Manager $fractal, AbstractRepositoryInterface $repository = null)
    {
        $this->fractal = $fractal;
        if (!$repository) {
            $repository = app()->make($this->repository);
        }
        $this->repository = $repository;
    }

    public function getQueryset()
    {
        return $this->repository->all();
    }

    public function getQuerysetById($id)
    {
        return $this->repository->findOrFail($id);
    }

    protected function renderResponse(Scope $data)
    {
        $request = request();
        if ($request->ajax()) {
            return response()->json($data->toArray());
        } else {
            return view('harmony::base', ['data' => $data->toJson()]);
        }
    }
}
