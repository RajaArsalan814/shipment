<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Charges;
class PortCharges extends Model
{
    protected $table='port_charges';
    public function charges()
    {
        return $this->hasOne('App\Charges', 'id', 'charges_id');
    }
    public $timestamps=false;
}
