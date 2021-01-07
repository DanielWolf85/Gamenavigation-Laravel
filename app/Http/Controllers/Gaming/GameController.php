<?php

namespace App\Http\Controllers\Gaming;

use Illuminate\Http\Request;
use App\Http\Controllers\Gaming\BaseController;
use App\Repositories\GamingGameRepository;
use App\Repositories\GamingChapterRepository;
use App\Models\Chapter;

class GameController extends BaseController
{

    /**
     * @var GamingGameRepository
     */
    private $gamingGameRepository;


    /**
     * @var  GamingChapterRepository
     */
    private $gamingChapterRepository;



    function __construct()
    {
        parent::__construct();

        $this->gamingGameRepository = app(GamingGameRepository::class);
        $this->gamingChapterRepository = app(GamingChapterRepository::class);
    }

    public function show($id)
    {
        $game = $this
            ->gamingGameRepository
            ->getEdit($id);

        $chapters = Chapter::all()->where('game_id', $id)->where('is_published', 1);


        if (empty($game) || empty($chapters)) {
            abort(404);
        }

        return view('gaming.game.index', compact(
            'game',
            'chapters'
        ));
    }
}
