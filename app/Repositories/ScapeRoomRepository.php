<?php


namespace App\Repositories;

use App\Interfaces\ScapeRoomInterface;
use App\Models\ScapeRoom;

class ScapeRoomRepository implements ScapeRoomInterface
{
    public function index()
    {
        return (new ScapeRoom())->all();
    }

    public function show($scapeRoom)
    {
        return $scapeRoom;
    }

    public function timeSlots($scapeRoom)
    {
        $timeSlots = [];

        foreach ($scapeRoom->timeSlots as $timeSlot) {
            $timeSlots = $timeSlot->bookings()->count() >= $timeSlot->maximum_number;
        }

        return $timeSlots;
    }
}
