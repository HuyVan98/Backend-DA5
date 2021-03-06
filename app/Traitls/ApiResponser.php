<?php

namespace App\Traitls;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

trait ApiResponser
{
    /**
     * https://viblo.asia/p/laravel-collection-MVpvKNQwkKd
     */

    private function successResponser($data, $code)
    {
        return response()->json($data, $code);
    }
    protected function errorResponser($message, $code)
    {
        return response()->json(['erorr' => $message, 'code' => $code], $code);
    }
    protected function showAll(Collection $collection, $code = 200)
    {
        return $this->successResponser(['data' => $collection], $code);
    }
    protected function showOne(Model $model, $code = 200)
    {
        return $this->successResponser(['data' => $model], $code);
    }
    protected function showMessage($message, $code = 200)
    {
        return $this->successResponser(['data' => $message], $code);
    }
}