<?php

namespace App\Interfaces;

interface ScapeRoomInterface
{
    public function index();

    public function show($scapeRoom);

    public function timeSlots($scapeRoom);
}
