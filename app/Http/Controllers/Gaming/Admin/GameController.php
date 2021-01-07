<?php

namespace App\Http\Controllers\Gaming\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Gaming\Admin\AdminBaseController;
use App\Repositories\GamingGameRepository;
use App\Http\Requests\GameStoreRequest;
use App\Http\Requests\GameUpdateRequest;
use App\Models\Game;

class GameController extends AdminBaseController
{
    /**
     * @var GamingGameRepository
     */
    private $gamingGameRepository;

    public function __construct()
    {
        parent::__construct();

        $this->gamingGameRepository = app(GamingGameRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this
            ->gamingGameRepository
            ->getAllWithPaginate(25);

        return view('gaming.admin.games.index', compact(
           'paginator'   
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Game();

        return view('gaming.admin.games.edit', compact(
            'item'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameStoreRequest $request)
    {
        $data = $request->all();
        // Короткая запись создания модели и ее сохранения в базу
        $item = Game::create($data);

        // Сохранение картинки
        $this->storeImage($item);

        if ($item) {
            return redirect()
                ->route('gaming.admin.games.edit', $item->id)
                ->with(['success' => 'Игра успешно сохранена']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения игры'])
                ->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(__METHOD__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this
            ->gamingGameRepository->getEdit($id);

        if (empty($item)) {
            abort(404);
        }

        return view('gaming.admin.games.edit', compact(
            'item'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GameUpdateRequest $request, $id)
    {

        $item = $this
            ->gamingGameRepository->getEdit($id);

        if(empty($item)) {
            return back()
                ->withErrors(['msg' => "Игра id=[{$id}] не найдена для обновления"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        // Сохранение картинки
        $this->storeImage($item);

        if ($result) {
            return redirect()
                ->route('gaming.admin.games.edit', $item->id)
                ->with(['success' => 'Игра успешно обновлена']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка обновления игры'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Удалить, но сохранить в базе
        // $result = Game::destroy($id);
        
        // Полное удаление из базы данных
        $result = Game::find($id)->forceDelete();

        if ($result) {
            return redirect()
                ->route('gaming.admin.games.index')
                ->with(['success' => "Запись id[{$id}] успешно удалена"]);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка удаления']);
        }
    }


    /**
     * Сохранение картинки
     * @param  object $item
     * @return 
     */
    private function storeImage($item)
    {
        if (request()->has('cover')) {
            $item->update([
                'cover' => request()->cover->store('uploads/covers/', 'public')
            ]);
        }
    }
}
