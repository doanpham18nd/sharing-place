<?php

namespace App\Repositories\Eloquent\Job;

use App\Agreement;
use App\Job;
use App\Repositories\Eloquent\EloquentRepository;

class JobRepository extends EloquentRepository implements JobRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Job::class;
    }

    /**
     * Get all posts only published
     * @return mixed
     */
    public function getAllPublished()
    {
        $result = $this->model->paginate(1);

        return $result;
    }

    public function getAllAvailable()
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