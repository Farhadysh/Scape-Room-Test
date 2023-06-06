<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ScapeRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_of_room',
        'theme',
        'maximum_number'
    ];


    public function timeSlots(): BelongsToMany
    {
        return $this->belongsToMany(TimeSlot::class);
    }
}
