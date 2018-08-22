<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    public function demands()
    {
        return $this->hasMany('App\Demand' , 'client_id', 'id');
    }

}
