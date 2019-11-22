<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charges extends Model
{
    protected $table='charges';

    protected $fillable=['code','description','charge_type'];
    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }
    public $timestamps=false;
}
