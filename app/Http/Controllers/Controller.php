<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class Controller
{

    protected function toResponse(array $data = [], string $message, int $code): JsonResponse
    {
        $content = [
            'message' => $message,
        ];

        if (!empty($data)) $content['data'] = $data;

        return response()->json($content, $code);
    }
}
