<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id',
        'name',
        'effects',
        'pendulumEffects',
        'image_full',
        'image_cropped',
    ];
}
