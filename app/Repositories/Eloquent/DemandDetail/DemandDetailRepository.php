<?php

namespace App\Repositories\Eloquent\DemandDetail;

use App\Demand;
use App\DemandDetail;
use App\Repositories\Eloquent\EloquentRepository;

class DemandDetailRepository extends EloquentRepository implements DemandDetailRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return DemandDetail::class;
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
            ->first();

        return $result;
    }

}