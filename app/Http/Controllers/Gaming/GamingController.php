<?php

namespace App\Http\Controllers\Gaming;

use Illuminate\Http\Request;
use App\Http\Controllers\Gaming\BaseController;
use App\Models\Game;
use App\Repositories\GamingGameRepository;


class GamingController extends BaseController
{
    /**
     * @var  GamingGameRepository
     */
    private $gamingGameRepository;



    public function __construct()
    {
        parent::__construct();

        $this->gamingGameRepository = app(GamingGameRepository::class);
    }


    public function index()
    {
        $latestGames = $this
            ->gamingGameRepository
            ->getLatestGames();

        return view('gaming.index', compact(
            'latestGames'
        ));
    }



    public function catalog()
    {
        $paginator = $this
            ->gamingGameRepository
            ->getAllWithPaginate(25);

        $latestGames = $this
            ->gamingGameRepository
            ->getLatestGames();

        return view('gaming.catalog', compact(
            'paginator',
            'latestGames'
        ));
    }
}
