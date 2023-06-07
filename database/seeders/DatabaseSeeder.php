<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ScapeRoom;
use App\Models\TimeSlot;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $scapeRoom = ScapeRoom::create([
            'name_of_room' => 's1', 
            'theme' => 'scary',
        ]);

        TimeSlot::create([
            'scape_room_id' => $scapeRoom->id,
            'time_slot' => Carbon::now()->addHours(8),
            'maximum_number' => 10,
            'price' => 50000,
        ]);
    }
}
