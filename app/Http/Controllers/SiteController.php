<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Repositories\GamingGameRepository;

class SiteController extends Controller
{
    private $gamingGameRepository;

    public function __construct()
    {
        $this->gamingGameRepository = app(GamingGameRepository::class);
    }


    public function index(Request $request)
    {
        if ($request->get('search') !== null) {
            $searchResult = $this
                ->gamingGameRepository
                ->getSearchingGames($request->get('search'));
        } else {
            $searchResult = null;
        }

        $latestGames = $this
            ->gamingGameRepository
            ->getLatestGames();

        return view('site.index', compact(
            'latestGames',
            'searchResult'
        ));
    }



    /**
     * Search Action
     * @param  Request $request
     * @return View
     */
    public function search(Request $request)
    {        
        if ($request->get('search') !== null) {
            $searchResult = $this
                ->gamingGameRepository
                ->getSearchingGames($request->get('search'));
        } else {
            $searchResult = null;
        }

        $latestGames = $this
            ->gamingGameRepository
            ->getLatestGames();

        return view('site.search', compact(
            'latestGames',
            'searchResult'
        ));
    }
}
