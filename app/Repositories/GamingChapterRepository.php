<?php

namespace App\Repositories;

use App\Models\Chapter as Model;
use Illuminate\Pagination\LenghtAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class GamingChapterRepository
 *
 * @package App\Repositories
 */
class GamingChapterRepository extends CoreRepository
{
    
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }


    /**
     * Получить модель для редактирования в админке
     * @param  integer $id
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    

    /**
     * Получить главы по id игры
     * @param integer $gameId
     * @return Model
     */
    public function getChaptersByGameId($gameId)
    {
        return Model::all()->where('game_id', $gameId);
    }

    /**
     * Получить главы с пагинацией
     * 
     * @param int|null $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate($perPage = 5)
    {
        $columns = [
            'id',
            'title',
            'image_1',
            'is_published',
            'created_at',
            'game_id',
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->with([
                'game:id,name'
            ])
            ->paginate($perPage);

        return $result;
    }  

}