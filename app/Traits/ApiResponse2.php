<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponse2
{
    protected function successResponse($data, $mensaje = 'Operación exitosa', $code = Response::HTTP_OK)
    {
        return response()->json(
            [
                "status" => $code,
                "message" => $mensaje,
                "data" => $data
            ],
            $code
        );
    }

    protected function errorResponse($mensaje = 'Error', $code = Response::HTTP_BAD_REQUEST)
    {
        return response()->json(
            [
                "status" => $code,
                "message" => $mensaje,
                "data" => null
            ],
            $code
        );
    }
}
