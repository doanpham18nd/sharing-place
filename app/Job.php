<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';

    public function demandDetail()
    {
        return $this->hasOne('App\DemandDetail', 'job_id', 'id');
    }
}
