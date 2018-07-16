<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['title','cut_source','best_for','description','image','price_per_kg','slug','category'];

    /** Methods */
    public static function productTotal()
    {
        return count(Product::all());
    }
}
