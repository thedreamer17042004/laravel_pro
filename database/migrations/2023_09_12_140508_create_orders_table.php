<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->nullable(false)->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->string('name', 150)->nullable(true);
            $table->string('email', 150)->nullable(true)->unique();
            $table->integer('phone')->nullable(true)->unsigned();
            $table->string('address', 150)->nullable(true);
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
        Schema::dropIfExists('orders');
    }
}
