<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContainerLine extends Model
{
    protected $table='company';

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }
}
