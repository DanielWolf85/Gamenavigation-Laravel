<?php

namespace App\Http\Controllers\Gaming\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Gaming\Admin\AdminBaseController;
use App\Repositories\GamingChapterRepository;
use App\Repositories\GamingGameRepository;
use App\Http\Requests\ChapterStoreRequest;
use App\Http\Requests\ChapterUpdateRequest;
use App\Models\Chapter;

class ChapterController extends AdminBaseController
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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->get('game_id') !== null) {
            $paginator = $this
                ->gamingChapterRepository
                ->getChaptersByGameId($request->get('game_id'));
        }
        else
        {
            $paginator = $this
            ->gamingChapterRepository
            ->getAllWithPaginate(25);
        }
        

        $gameList = $this
            ->gamingGameRepository
            ->getForComboBox();


        return view('gaming.admin.chapters.index', compact(
            'paginator',
            'gameList'
        ));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Chapter();

        $gameList = $this
            ->gamingGameRepository
            ->getForComboBox();

        return view('gaming.admin.chapters.edit', compact(
            'item',
            'gameList'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChapterStoreRequest $request)
    {
        $data = $request->all();

        $item = Chapter::create($data);

        // Сохранение картинок
        $this->storeImages($item);

        if ($item) {
            return redirect()
                ->route('gaming.admin.chapters.edit', $item->id)
                ->with(['success' => 'Глава успешно сохранена']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения главы'])
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
        //
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
            ->gamingChapterRepository->getEdit($id);

        if (empty($item)) {
            abort(404);
        }

        $gameList = $this
            ->gamingGameRepository->getForComboBox();

        return view('gaming.admin.chapters.edit', compact(
            'item',
            'gameList'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChapterUpdateRequest $request, $id)
    {
        $item = $this
            ->gamingChapterRepository->getEdit($id);

        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Глава id=[{$id}] не найдена для обновления"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        // Сохранение картинок
        $this->storeImages($item);

        if ($result) {
            return redirect()
                ->route('gaming.admin.chapters.edit', $item->id)
                ->with(['success' => 'Глава успешно обновлена']);
        } else {
            return back()
                ->withErrors(['msg' => 'ОБшибка обновления главы'])
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
        $result = Chapter::find($id)->forceDelete();

        if ($result) {
            return redirect()
                ->route('gaming.admin.chapters.index')
                ->with(['success' => "Запись id [{$id}] успешно удалена"]);
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
    private function storeImages($item)
    {
        if (request()->has(['image_1'])) {
            $item->update([
                'image_1' => request()->image_1->store('uploads/chapters/', 'public')
            ]);
        }
        if (request()->has(['image_2'])) {
            $item->update([
                'image_2' => request()->image_2->store('uploads/chapters/', 'public')
            ]);
        }
        if (request()->has(['image_3'])) {
            $item->update([
                'image_3' => request()->image_3->store('uploads/chapters/', 'public')
            ]);
        }
        if (request()->has(['image_4'])) {
            $item->update([
                'image_4' => request()->image_4->store('uploads/chapters/', 'public')
            ]);
        }
    }
}
