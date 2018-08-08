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
            $table->string('name');
            $table->text('long_description');
            $table->integer('manufacturer_id')->unsigned();
            $table->foreign('manufacturer_id')
                  ->references('id')
                  ->on('manufacturers')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('series');
            $table->string('sku');
            $table->integer('product_condition_id')->unsigned();
            $table->foreign('product_condition_id')
                  ->references('id')
                  ->on('product_conditions')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->integer('unit_id')->unsigned();
            $table->foreign('unit_id')
                  ->references('id')
                  ->on('units')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->boolean('is_active')->default(1);
            $table->boolean('is_featured');
            $table->boolean('is_shippable');
            $table->text('notes');
            $table->string('document');
            $table->string('seo_tool');
            $table->string('slug');
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
