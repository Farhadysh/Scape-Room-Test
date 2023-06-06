<?php

namespace App\Interfaces;

interface BookingInterface
{
    public function index();

    public function store($request);

    public function delete($booking);
}