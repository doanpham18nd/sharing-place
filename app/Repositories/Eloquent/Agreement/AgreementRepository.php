<?php

namespace App\Repositories\Eloquent\Agreement;

use App\Agreement;
use App\Repositories\Eloquent\EloquentRepository;
use Carbon\Carbon;

class AgreementRepository extends EloquentRepository implements AgreementRepositoryInterface
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
            ->first();

        return $result;
    }

    /**
     * Get post only published
     * @param $id int Post ID
     * @return mixed
     */
    public function findByVendorId($id, $vendorId)
    {
        $result = $this
            ->model
            ->where('id', $id)
            ->where('vendor_id', $vendorId)
            ->first();

        return $result;
    }

    public function insertAgreement($data)
    {
        $data['created_at'] = $data['updated_at'] = Carbon::now();
        return $this->model->insertGetId($data);
    }

    public function updateStatus($id, $status)
    {
        $data['agreement_status'] = $status;
        $data['updated_at'] = Carbon::now();
        $this->model->where('id', $id)->update($data);
    }

}