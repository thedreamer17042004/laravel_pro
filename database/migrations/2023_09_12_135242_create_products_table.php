<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name', 150)->nullable(false)->unique();
            $table->string('slug', 150)->unique();
            $table->string('image')->nullable(true);
            $table->float('price', 150)->nullable(false);
            $table->string('description', 150)->nullable(true);
            $table->string('available', 150)->nullable(true);
            $table->integer('category_id')->nullable(false)->unsigned();
            $table->foreign('category_id')->references('id')->on('categories'); 
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
