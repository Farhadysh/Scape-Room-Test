<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ScapeRoomTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_scape_room_index(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->get('api/v1/scape_rooms');

        $response->assertStatus(200);
    }

    public function test_scape_room_show(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->get('api/v1/scape_rooms/1');

        $response->assertStatus(200);
    }

    public function test_scape_room_timeSlots(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->get('api/v1/scape_rooms/1/timeSlots');

        $response->assertStatus(200);
    }
}
