<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable
{
    protected $table = 'vendors';

    protected $guard = 'company';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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
