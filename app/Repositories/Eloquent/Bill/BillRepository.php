<?php

namespace App\Repositories\Eloquent\Bill;

use App\Agreement;
use App\Bill;
use App\Repositories\Eloquent\EloquentRepository;
use Carbon\Carbon;

class BillRepository extends EloquentRepository implements BillRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Bill::class;
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

    public function insertBill($data)
    {
        $bill['client_id'] = $data['client_id'];
        $bill['vendor_id'] = $data['vendor_id'];
        $bill['demand_id'] = $data['demand_id'];
        $bill['price_total'] = $data['price_total'];
        $bill['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
        $bill['bill_status'] = 1;
        return $this->model->insertGetId($bill);
    }

}