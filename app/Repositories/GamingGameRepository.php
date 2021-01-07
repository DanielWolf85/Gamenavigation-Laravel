<?php

namespace App\Repositories;

use App\Models\Game as Model;
use Illuminate\Pagination\LenghtAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class GamingGameRepository
 *
 * @package  App\Repositories
 */
class GamingGameRepository extends CoreRepository
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
     * Получить все игры с пагинацией
     * @param  integer $perPage
     * @return Model
     */
    public function getAllWithPaginate($perPage = 5)
    {
        $columns = [
            'id',
            'name',
            'cover',
            'info',
            'is_published',
            'created_at',
            'updated_at',
        ];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->where('is_published', 1)
            ->orderBy('id', 'DESC')
            ->paginate($perPage);

        return $result;
    }

    /**
     * Получить список игр для вывода в выпадающем списке
     * 
     * @return Collection
     */
    public function getForComboBox()
    {
        $columns = implode(', ', [
            'id',
            'CONCAT (id, ". ", name) AS name_combo_box',
        ]);

        // $result[] = $this
        //     ->startConditions()
        //     ->all();

        // $result[] = $this
        //     ->startConditions()
        //     ->select('blog_categories.*', \DB::raw('CONCAT (id, " . ", title) AS id_title'))
        //     ->toBase()
        //     ->get();

        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();
        
        return $result;
    }

    /**
     * Вывод последних опубликованных прохождений игр
     *
     * @param integer $count
     * @return  Collection
     */
    public function getLatestGames($count = 4)
    {
        $result = Model::latest('created_at')->where('is_published', 1)->limit($count)->get();

        return $result;
    }

    /**
     * Поиск игры по слову
     *
     * @param string $search
     * @return Collection
     */
    public function getSearchingGames($search)
    {
        $result = Model::all()->where('name', 'like', $search);

        return $result;
    }
}