<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'cover',
        'info',
        'creator',
        'label',
        'platforms',
        'realise',
        'genre',
        'model',
        'age_limit',
        'processor_min',
        'processor_max',
        'ram_min',
        'ram_max',
        'video_card_min',
        'video_card_max',
        'hdd_space_min',
        'hdd_space_max',
        'os_min',
        'os_max',
        'facts',
        'is_published',
        'published_at',
    ];
}
