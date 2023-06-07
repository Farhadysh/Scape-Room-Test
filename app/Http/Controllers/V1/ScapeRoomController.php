<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Interfaces\ScapeRoomInterface;
use App\Models\ScapeRoom;

class ScapeRoomController extends Controller
{
    protected $scapeRoomRepository;

    public function __construct(ScapeRoomInterface $scapeRoomInterface)
    {
        $this->scapeRoomRepository = $scapeRoomInterface;
    }

    /**
     * get all scape rooms
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $scape_rooms = $this->scapeRoomRepository->index();

        return response()->json(['scape_rooms' => $scape_rooms]);
    }

    /**
     * show a single scape room
     * @param \App\Models\ScapeRoom $scapeRoom
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ScapeRoom $scapeRoom)
    {
        $scape_room = $this->scapeRoomRepository->show($scapeRoom);

        return response()->json(['scape_room' => $scape_room]);
    }

    /**
     * show availble time slots
     * @param \App\Models\ScapeRoom $scapeRoom
     * @return \Illuminate\Http\JsonResponse
     */
    public function timeSlots(ScapeRoom $scapeRoom)
    {
        $time_slots = $this->scapeRoomRepository->timeSlots($scapeRoom);

        return response()->json(['time_slot_available' => $time_slots]);
    }
}
