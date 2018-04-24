<?php

namespace Tests\Unit\Http\Controllers;

use Matthewbdaly\Harmony\Transformers\BaseTransformer;
use Illuminate\Database\Eloquent\Model;

class DummyTransformer extends BaseTransformer
{
    public function transform(Model $model)
    {
        return [
            'id'            => (int) $model->id,
        ];
    }
}
