<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Interfaces\BookingInterface;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected $bookingRepository;

    public function __construct(BookingInterface $bookingInterface)
    {
        $this->bookingRepository = $bookingInterface; 
    }

    public function index()
    {
        $bookings = $this->bookingRepository->index();

        return response()->json(['bookings',$bookings]);
    }

    public function store(Request $request)
    {
        $this->bookingRepository->store($request);

        return response()->json(['message','store booking success'],201);
    }


}
