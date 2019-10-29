<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    protected $table='shipper';

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }
}
