<?php

namespace App\Repositories\Eloquent\District;

use App\District;
use App\Repositories\Eloquent\EloquentRepository;

class DistrictRepository extends EloquentRepository implements DistrictRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return District::class;
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

    public function getPreBy($provinceId)
    {
        return $this->model->where('province_id', $provinceId)->get();
    }

}