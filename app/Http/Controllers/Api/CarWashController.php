<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CarWashResource;
use App\Models\CarWash;
use Illuminate\Http\Request;

class CarWashController extends Controller
{
    /**
     * Tampilkan semua car wash (public).
     */
    public function index(Request $request)
    {
        $query = CarWash::with('type');

        // Optional filter by type
        if ($request->has('type_id')) {
            $query->where('type_id', $request->type_id);
        }

        // Optional search by name
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $carWashes = $query->latest()->paginate(10);

        return CarWashResource::collection($carWashes);
    }

    /**
     * Detail car wash by id/slug.
     */
    public function show($slug)
    {
        $carWash = CarWash::with('type')
            ->where('slug', $slug)
            ->firstOrFail();

        return new CarWashResource($carWash);
    }
}
