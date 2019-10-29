<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consignee extends Model
{
    protected $table='consignee';

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }
}
