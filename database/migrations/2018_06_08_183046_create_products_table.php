<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title'); //Product Title
            $table->string('cut_source'); 
            $table->string('best_for'); //Create some kind of tagging for this
            $table->text('description');    //Make it html friendly
            $table->string('image'); // 
            $table->integer('price_per_kg'); //Price Per Kg-Ensure rounded numbers
            $table->string('category')->nullable(); //Meat,Beef, Chicken
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
