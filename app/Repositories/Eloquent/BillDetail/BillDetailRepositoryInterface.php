<?php
/**
 * Created by PhpStorm.
 * User: yaphe
 * Date: 6/28/2018
 * Time: 7:09 PM
 */

namespace App\Repositories\Eloquent\BillDetail;


interface BillDetailRepositoryInterface
{

    /**
     * Get all posts only published
     * @return mixed
     */
    public function getAllPublished();

    /**
     * Get post only published
     * @param $id int Post ID
     * @return mixed
     */
    public function findOnlyPublished($id);

}