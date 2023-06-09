<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Interfaces\BookingInterface;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected $bookingRepository;

    public function __construct(BookingInterface $bookingInterface)
    {
        $this->bookingRepository = $bookingInterface;
    }

    /**
     * get all booking from auth user
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $bookings = $this->bookingRepository->index();

        return response()->json(['bookings' => $bookings]);
    }

    /**
     * store new booking
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //check double booking
        if (Booking::whereUserId($request->user_id)->whereTimeSlotId($request->time_slot_id)->exists()) {
            return response()->json(['message' => 'this booking already exist']);
        }

        $this->bookingRepository->store($request);

        return response()->json(['message' => 'store booking success'], 201);
    }

    /**
     * delete booking
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Booking $booking)
    {
        $this->bookingRepository->delete($booking);

        return response()->json(['message' => 'booking delete succes']);
    }
}
