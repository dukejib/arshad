<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id','subtotal','grandtotal','status','city'
    ];


    /**  Relationships */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function order_details()
    {
        return $this->hasMany('App\OrderDetail');
    }

    public function pending_transactions()
    {
        return $this->hasMany('App\PendingTransaction');
    }

    public function completed_transactions()
    {
        return $this->hasMany('App\CompleteTransaction');
    }

    /** Methods */
    public static function pendingOrdersTotal()
    {
        return count(Order::where('status','Pending')->get());
    }

    public static function transitOrdersTotal()
    {
        return count(Order::where('status','Transit')->get());
    }

    public static function completedOrdersTotal()
    {
        return count(Order::where('status','Completed')->get());
    }
}
