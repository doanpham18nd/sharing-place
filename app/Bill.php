<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public function billDetails()
    {
        return $this->hasMany('App\BillDetail');
    }

    public function demand()
    {
        return $this->belongsTo('App\Demand');
    }

    public function vendor()
    {
        return $this->belongsTo('App\Vendor');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
