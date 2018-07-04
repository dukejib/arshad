<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompleteTransaction extends Model
{
    protected $fillable = [
        'order_id','order_total','payment_mode'
    ];


    /** Relationship */

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
