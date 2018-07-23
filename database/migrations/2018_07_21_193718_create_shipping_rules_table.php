<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_rules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('priority');
            $table->string('country');
            $table->string('shipping_provider');
            $table->string('shipping_features');
            $table->integer('minimum_order_total');
            $table->text('description');
            $table->boolean('is_exclusive');
            $table->string('thumbnail');
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
        Schema::dropIfExists('shipping_rules');
    }
}
