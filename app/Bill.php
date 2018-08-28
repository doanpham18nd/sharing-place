<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public function billDetails()
    {
        return $this->hasMany('App\BillDetail');
    }
}
