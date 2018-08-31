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
        $result = $this->model->with('client')->with('province')
            ->where('specify_time', date('Y-m-d'))
            ->orWhere(function ($query) {
                $query->where('start_date', '<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'));
            })
            ->get();
        return $result;
    }

    public function updateStatus($id, $status)
    {
        $demand = $this->model->find($id);
        $demand->status = $status;
        $demand->save();
    }

    public function getConfirm()
    {
        return $this->model->where('status', 2)->get();
    }

    public function getWorking()
    {
        return $this->model->where('status', 3)->get();
    }

    public function getDone()
    {
        return $this->model->where('status', 4)->get();
    }

    public function getCancel()
    {
        return $this->model->where('status', 5)->get();
    }

    public function getSearch($data)
    {
        // TODO: Implement getSearch() method.
    }
}