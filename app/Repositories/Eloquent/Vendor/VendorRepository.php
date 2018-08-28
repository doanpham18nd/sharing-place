<?php

namespace App\Repositories\Eloquent\Vendor;

use App\Repositories\Eloquent\EloquentRepository;
use App\Vendor;

class VendorRepository extends EloquentRepository implements VendorRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Vendor::class;
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

    public function getByAddress($data)
    {
        return $this->model->where([
                ['province_id', $data['province_id']],
                ['district_id', $data['district_id']],
                ['prefecture_id', $data['prefecture_id']],
            ]
        )->get();
    }

}