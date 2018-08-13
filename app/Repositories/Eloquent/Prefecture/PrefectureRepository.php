<?php

namespace App\Repositories\Eloquent\Prefecture;

use App\Prefecture;
use App\Repositories\Eloquent\EloquentRepository;

class PrefectureRepository extends EloquentRepository implements PrefectureRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Prefecture::class;
    }

    /**
     * Get all posts only published
     * @return mixed
     */
    public function getAllPublished()
    {
        $result = $this->model->where('published', 1)->orderBy('ordering', 'ASC')->get();

        return $result;
    }

    /**
     * Get post only published
     * @param $id int Post ID
     * @return mixed
     */
    public function findOnlyPublished($id)
    {
        $result = $this
            ->model
            ->where('id', $id)
            ->first();

        return $result;
    }

    public function getPreBy($prefectureId)
    {
        return $this->model->where('district_id', $prefectureId)->get();
    }

}