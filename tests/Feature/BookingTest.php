<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookingTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_booking_index(): void
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        auth()->loginUsingId($user->id);

        $response = $this->get('api/v1/bookings');

        $response->assertStatus(200);
    }

    public function test_booking_store(): void
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        auth()->loginUsingId($user->id);

        $this->seed(DatabaseSeeder::class);

        $response = $this->postJson('api/v1/bookings',[
            'scape_room_id' => 1,
            'time_slot_id' => 1
        ]);

        $response->assertStatus(201);
    }
}
