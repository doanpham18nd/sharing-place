<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    protected $table = 'demands';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function demandDetails()
    {
        return $this->hasMany('App\DemandDetail', 'demand_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo('App\Client', 'client_id' , 'id');
    }

    public function province()
    {
        return $this->belongsTo('App\Province', 'province_id', 'id');
    }

    public function prefecture()
    {
        return $this->belongsTo('App\Prefecture');
    }

    public function district()
    {
        return $this->belongsTo('App\District');
    }

    public function job()
    {
        return $this->belongsTo('App\Job');
    }
}
