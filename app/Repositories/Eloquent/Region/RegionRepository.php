<?php

namespace App\Repositories\Eloquent\Region;

use App\Demand;
use App\Repositories\Eloquent\EloquentRepository;

class RegionRepository extends EloquentRepository implements RegionRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Demand::class;
    }

    /**
     * Get all posts only published
     * @return mixed
     */
    public function getAllPublished()
    {
        $result = $this->model->where('del_flg', 1)->get();

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
            ->where('del_flg', 1)
            ->first();

        return $result;
    }

}