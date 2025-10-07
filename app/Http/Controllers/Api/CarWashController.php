<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CarWashResource;
use App\Models\CarWash;
use Illuminate\Http\Request;

class CarWashController extends Controller
{
    public function index(Request $request)
    {
        $query = CarWash::with('type');

        if ($request->has('type_id')) {
            $query->where('type_id', $request->type_id);
        }

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->boolean('all')) {
            $carWashes = $query->get();
            return CarWashResource::collection($carWashes);
        }

        $carWashes = $query->latest()->paginate(10);
        return CarWashResource::collection($carWashes);
    }

    public function show($identifier)
    {
        $carWash = CarWash::with('type')
            ->where('slug', $identifier)
            ->orWhere('id', $identifier)
            ->firstOrFail();

        return new CarWashResource($carWash);
    }
}
