<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Game;

class Chapter extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'game_id',
        'image_1',
        'content_1',
        'image_2',
        'content_2',
        'image_3',
        'content_3',
        'image_4',
        'content_4',
        'is_published'
    ];

    /**
     * Игра, к которой принадлежит глава
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function game()
    {
        // глава принадлежит игре
        return $this->belongsTo(Game::class);
    }
}
