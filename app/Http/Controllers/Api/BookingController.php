<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'car', 'carWash', 'discount', 'payments'])->get();
        return response()->json($bookings);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_wash_id' => 'required|exists:car_washes,id',
            'car_id' => 'nullable|exists:cars,id',
            'discount_id' => 'nullable|exists:discounts,id',
            'booking_date' => 'required|date',
            'booking_time' => 'required',
        ]);

        $booking = Booking::create($data);

        return response()->json([
            'message' => 'Booking berhasil dibuat',
            'data' => $booking
        ], 201);
    }

    public function getDiscounts()
    {
        return response()->json(\App\Models\Discount::all());
    }
}
