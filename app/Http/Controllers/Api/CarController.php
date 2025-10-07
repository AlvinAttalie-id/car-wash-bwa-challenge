<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $cars = Car::where('user_id', $request->user()->id)->get();

        return response()->json([
            'status' => true,
            'data' => $cars,
        ]);
    }
}
