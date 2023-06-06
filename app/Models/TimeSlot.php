<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TimeSlot extends Model
{
    use HasFactory;

    protected $fillable = [
        'scape_room_id',
        'time_slot',
        'price',
    ];

    public function scapeRoom(): HasOne
    {
        return $this->hasOne(ScapeRoom::class);
    }
}
