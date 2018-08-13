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
}
