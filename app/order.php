<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function order_products()
    {
        return $this->hasMany('App\Orderproduct','order_id');
    }
}
