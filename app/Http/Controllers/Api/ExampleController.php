<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ExampleController extends Controller
{
    public function hello(): JsonResponse
    {
        return response()->json([
            "message" => "Le premier envoie avec le json"
        ]);
    }
}
