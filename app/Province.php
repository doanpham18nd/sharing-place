<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';

    public function demand()
    {
        return $this->hasOne('App\Demand');
    }

    public function vendor()
    {
        return $this->hasMany('App\Vendor');
    }
}
