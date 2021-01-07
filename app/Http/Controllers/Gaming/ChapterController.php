<?php

namespace App\Http\Controllers\Gaming;

use Illuminate\Http\Request;
use App\Http\Controllers\Gaming\BaseController;
use App\Repositories\GamingChapterRepository;
use App\Repositories\GamingGameRepository;
use App\Models\Chapter;


class ChapterController extends BaseController
{
    /**
     * @var  GamingChapterRepository
     */
    private $gamingChapterRepository;


    /**
     * @var  GamingGameRepository
     */
    private $gamingGameRepository;


    public function __construct()
    {
        parent::__construct();

        $this->gamingChapterRepository = app(GamingChapterRepository::class);

        $this->gamingGameRepository = app(GamingGameRepository::class);
    }



    public function show($gameId, $chapterId)
    {
        $chapter = $this
            ->gamingChapterRepository
            ->getEdit($chapterId);

        $chapters = Chapter::all()->where('game_id', $gameId)->where('is_published', 1);

        $game = $this
            ->gamingGameRepository
            ->getEdit($gameId);

        return view('gaming.chapter.index', compact(
            'chapter',
            'chapters',
            'game'
        ));
    }
}
