<?php

namespace Matthewbdaly\Harmony\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Matthewbdaly\LaravelRepositories\Repositories\Interfaces\AbstractRepositoryInterface;
use League\Fractal\Manager;
use League\Fractal\Scope;

/**
 * Base restful controller
 */
abstract class RestfulController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Constructor
     *
     * @param Manager                     $fractal    The Fractal manager instance.
     * @param AbstractRepositoryInterface $repository The repository to use.
     * @return void
     */
    public function __construct(Manager $fractal, AbstractRepositoryInterface $repository = null)
    {
        $this->fractal = $fractal;
        if (!$repository) {
            $repository = app()->make($this->repository);
        }
        $this->repository = $repository;
    }

    /**
     * Get default queryset
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getQueryset()
    {
        return $this->repository->all();
    }

    /**
     * Get single object by ID
     *
     * @param mixed $id The ID of the object to retrieve.
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getQuerysetById($id)
    {
        return $this->repository->findOrFail($id);
    }

    /**
     * Render response as either JSON or HTML
     *
     * @param Scope $data The data to render.
     * @return Illuminate\Http\Response
     */
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
