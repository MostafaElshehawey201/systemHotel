<?php

namespace App\Trait\Response;

trait ApiResponse
{
    public function success($data, $code)
    {
        return response()->json([
            "success" => true,
            "data" => $data,
            "errors" => null,
        ], $code);
    }

    public function error($errors, $code)
    {
        return response()->json([
            "success" => false,
            "data" => null,
            "errors" => $errors
        ], $code);
    }
}
