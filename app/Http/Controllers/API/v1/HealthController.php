<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HealthController extends Controller
{
    public function __invoke(Request $request)
    {
        return response([
            'version' => 1,
            'healthy' => true,
            'timestamp' => now(),
            'authenticated' => $request->user() ? true : false,
            'extra' => [],
        ]);
    }
}
