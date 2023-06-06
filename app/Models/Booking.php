<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'scape_room_id',
        'time_slot_id',
        'final_price',
        'discount',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function scapeRoom(): HasOne
    {
        return $this->hasOne(ScapeRoom::class);
    }

    public function timeSlot(): HasOne
    {
        return $this->hasOne(TimeSlot::class);
    }
}
