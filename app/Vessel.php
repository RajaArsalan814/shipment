<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class  Vessel extends Model
{
    protected $table='vessel';

    protected $fillable=['code','name','owner'];
    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }
}
