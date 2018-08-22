<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    protected $table = 'prefectures';

    public function demand()
    {
        return $this->hasMany('App\Demand');
    }

    public function vendor()
    {
        return $this->hasMany('App\Vendor');
    }
}
