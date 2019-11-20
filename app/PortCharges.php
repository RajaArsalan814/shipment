<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Charges;
class PortCharges extends Model
{
    protected $table='port_charges';
    protected $fillable=['port_id','charges_id','amount'];
    public function charges()
    {
        return $this->hasOne('App\Charges', 'id', 'charges_id');
    }
    public $timestamps=false;
}
