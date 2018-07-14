<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id','product_id','product_name','product_qty','product_price'
    ];


    /** Relationship */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
