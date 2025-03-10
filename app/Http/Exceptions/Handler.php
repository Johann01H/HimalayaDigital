<?php

use Illuminate\Support\Facades\Lang;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\Request;
use Throwable;

public function render(Request $request, Throwable $exception)
{
    if ($exception instanceof ModelNotFoundException) {
        return response()->json([
            'error' => Lang::get('errors.model_not_found')
        ], 404);
    }

    if ($exception instanceof RelationNotFoundException) {
        return response()->json([
            'error' => Lang::get('errors.collection_property_not_found')
        ], 400);
    }

    if ($exception instanceof NotFoundHttpException) {
        return response()->json([
            'error' => Lang::get('errors.not_found')
        ], 404);
    }

    return parent::render($request, $exception);
}
