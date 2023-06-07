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

    public function index()
    {
        $scape_rooms = $this->scapeRoomRepository->index();

        return response()->json(['scape_rooms',$scape_rooms]);
    }

    public function show(ScapeRoom $scapeRoom)
    {
        $scape_room = $this->scapeRoomRepository->show($scapeRoom);

        return response()->json(['scape_room',$scape_room]);
    }

    public function timeSlots(ScapeRoom $scapeRoom)
    {
        $time_slots = $this->scapeRoomRepository->timeSlots($scapeRoom);

        return response()->json(['time_slots',$time_slots]);
    }

}
