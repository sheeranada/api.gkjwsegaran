<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ApiHelper
{
    public static function sendResponse(mixed $data = null, String $message = "", int $status = 200): JsonResponse
    {
        $response = [
            'statusCode' => $status,
            'message' => $message,
            'data' => $data
        ];

        return response()->json($response, $status);
    }

    public static function sendError(string $message, int $status = 400, mixed $data = null): JsonResponse
    {
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data
        ];

        return response()->json($response, $status);
    }
}
