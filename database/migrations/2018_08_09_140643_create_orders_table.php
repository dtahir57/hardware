<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('phone_number');
            $table->string('company');
            $table->string('country');
            $table->string('city');
            $table->string('zip');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('payment_method');
            $table->string('order_no')->unique();
            $table->string('amount');
            $table->string('order_status')->default('Pending');
            $table->string('shipping_status')->default('Pending');
            $table->string('shipping_tracking_number')->nullable();
            $table->string('shipping_label_url')->nullable();
            $table->string('payment_status')->default('paid');
            $table->string('payment_reference')->nullable();
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
