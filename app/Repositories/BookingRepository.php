<?php


namespace App\Repositories;

use App\Interfaces\BookingInterface;
use App\Models\Booking;
use App\Models\TimeSlot;
use App\Models\User;
use Carbon\Carbon;

class BookingRepository implements BookingInterface
{
    public function index()
    {
        $user = auth()->user();

        return $user->bookings()->get();
    }

    public function store($request)
    {
        $timeSlot = (new TimeSlot())->whereId($request->time_slot_id)->first();

        $booking = new Booking();
        $booking->user_id = auth()->id();
        $booking->scape_room_id = $request->scape_room_id;
        $booking->time_slot_id = $request->time_slot_id;
        $booking->final_price = auth()->user()->date_of_birth == Carbon::now() ? $timeSlot->price * 10 / 100 - $timeSlot->price : $timeSlot->price;
        $booking->discount = auth()->user()->date_of_birth == Carbon::now() ? 1 : 0;
        $booking->save();
    }

    public function delete($booking)
    {
        $booking->delete();
    }
}
