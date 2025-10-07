<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $bookings = Booking::with(['carWash', 'car'])
            ->where('user_id', $request->user()->id)
            ->latest()
            ->get();

        return response()->json([
            'status' => true,
            'data' => $bookings,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'car_wash_id' => 'required|exists:car_washes,id',
            'car_id' => 'required|exists:cars,id',
            'booking_date' => 'required|date',
            'booking_time' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $booking = Booking::create([
            'user_id' => $request->user()->id,
            'car_wash_id' => $request->car_wash_id,
            'car_id' => $request->car_id,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'status' => 'pending',
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Booking created successfully',
            'data' => $booking->load('carWash', 'car'),
        ], 201);
    }
}
