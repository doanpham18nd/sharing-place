<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = 'bill_details';

    public function bill()
    {
        return $this->belongsTo('App\Bill');
    }

    public function job()
    {
        return $this->belongsTo('App\Job');
    }
}
