<?php

namespace App\Repositories\Eloquent\Client;

use App\Client;
use App\Repositories\Eloquent\EloquentRepository;

class ClientRepository extends EloquentRepository implements ClientRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Client::class;
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

    public function getByMonth()
    {
        return $this->model->whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))->count();
    }

}