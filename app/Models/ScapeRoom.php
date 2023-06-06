<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScapeRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_of_room',
        'theme',
        'maximum_number'
    ];
}
