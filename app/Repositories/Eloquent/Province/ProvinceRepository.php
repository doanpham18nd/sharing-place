<?php

namespace App\Repositories\Eloquent\Province;

use App\Province;
use App\Repositories\Eloquent\EloquentRepository;

class ProvinceRepository extends EloquentRepository implements ProvinceRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Province::class;
    }

    /**
     * Get all posts only published
     * @return mixed
     */
    public function getAllPublished()
    {
        $result = $this->model->all();
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

}