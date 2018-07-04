<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendingTransaction extends Model
{
    //

    protected $fillable = [
        'order_id','order_total'
    ];


    /** Relationship */

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
