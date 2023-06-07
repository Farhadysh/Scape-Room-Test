<?php


namespace App\Repositories;

use App\Interfaces\ScapeRoomInterface;
use App\Models\ScapeRoom;

class ScapeRoomRepository implements ScapeRoomInterface
{
    /**
     * get all scape rooms
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return (new ScapeRoom())->all();
    }

    /**
     * show a single scape room
     * @param mixed $scapeRoom
     * @return mixed
     */
    public function show($scapeRoom)
    {
        return $scapeRoom;
    }

    /**
     * show availble time slots
     * @param mixed $scapeRoom
     * @return array|bool
     */
    public function timeSlots($scapeRoom)
    {
        $timeSlots = [];

        foreach ($scapeRoom->timeSlots as $timeSlot) {
            $timeSlots = $timeSlot->bookings()->count() >= $timeSlot->maximum_number;
        }

        return $timeSlots;
    }
}
