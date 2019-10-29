<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depot extends Model
{
    protected $table='depot';

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }
}
