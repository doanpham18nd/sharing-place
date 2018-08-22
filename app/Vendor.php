<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'vendors';

    public function province()
    {
        return $this->belongsTo('App\Province');
    }

    public function prefecture()
    {
        return $this->belongsTo('App\Prefecture');
    }

    public function district()
    {
        return $this->belongsTo('App\District');
    }

}
