<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PortCharges;
class Port extends Model
{
    protected $table='port';

    // public function port_charges()
    // {
    //     return $this->hasOne('App\PortCharges', 'port_id', 'id');
    // }


    public function port_charges()
    {
        return $this->hasMany('App\PortCharges', 'port_id', 'id');
    }


    public $timestamps=false;
}
