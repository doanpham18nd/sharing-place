<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DemandDetail extends Model
{
    protected $table = 'demand_details';

    public function demand()
    {
        return $this->belongsTo('App\Demand');
    }

    public function job()
    {
        return $this->belongsTo('App\Job', 'job_id', 'id');
    }
}
