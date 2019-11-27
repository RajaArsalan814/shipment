<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentCharges extends Model
{
    protected $table='agent_charges';

    protected $fillable=['agent_id','charges_id','amount'];
    public function charges()
    {
        return $this->hasOne('App\Charges', 'id', 'charges_id');
    }
    public $timestamps=false;
}
