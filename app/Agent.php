<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AgentCharges;
use App\Port;
class Agent extends Model
{
    protected $table='agent';

    public function agent_charges()
    {
        return $this->hasMany('App\AgentCharges', 'agent_id', 'id');
    }


    public function ports()
    {
        return $this->hasOne('App\Port', 'id', 'port_id');
    }



    public $timestamps=false;

}
