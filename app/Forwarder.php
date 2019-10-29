<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forwarder extends Model
{
    protected $table='forwarder';

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }
}
