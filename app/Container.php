<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Port;
use App\ContainerType;
use App\ContainerLine;
class Container extends Model
{
    protected $table='container_master';
    public $timestamps=false;

    public function port()
    {
        return $this->hasOne('App\Port', 'id', 'pur_port_id');
    }
    public function container_type()
    {
        return $this->hasOne('App\ContainerType', 'id', 'container_type_id');
    }
    public function container_line()
    {
        return $this->hasOne('App\ContainerLine', 'id', 'company_id');
    }
}
