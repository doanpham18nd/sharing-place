<?php

namespace App\Repositories\Eloquent\Demand;

use App\Demand;
use App\Repositories\Eloquent\EloquentRepository;

class DemandRepository extends EloquentRepository implements DemandRepositoryInterface
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
        $result = $this->model->where('id', $id)->where('demands.del_flg', 1)->first();

        return $result;
    }

    public function getDemandToday()
    {
        $result = $this->model->with('client')->with('province')->where('specify_time' ,date('Y-m-d'))
            ->orWhere(function ($query) {
                $query->where('start_date','<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'));
            })->where('status', 1)
            ->get();
        return $result;
    }

}