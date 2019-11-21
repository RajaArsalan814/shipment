<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContainerType extends Model
{
    protected $table='container_type';

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }
    public $timestamps=false;
}
