<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';

    public function demand()
    {
        return $this->hasMany('app\Demand');
    }

    public function vendor()
    {
        return $this->hasMany('App\Vendor');
    }
}
