<?php

namespace App\Repositories\Eloquent\Bill;

use App\Agreement;
use App\Repositories\Eloquent\EloquentRepository;

class BillRepository extends EloquentRepository implements BillRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Agreement::class;
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