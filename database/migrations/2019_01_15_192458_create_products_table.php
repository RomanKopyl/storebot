<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            //'id', 'name', 'photo', 'description', 'category_id', 'price',
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('photo')->nullable();
            $table->longText('description')->nullable();
            $table->string('category')->nullable(); //temporarily category
            $table->unsignedInteger('category_id')->nullable();
            $table->integer('price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
