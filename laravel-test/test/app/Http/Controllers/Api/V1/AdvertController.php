<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class AdvertController extends Controller
{
    public function index() {
        return response()->json([
            'name' => 'Объявление 1'
        ], Response::HTTP_CREATED);
    }
}
