<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missing_products_product', function (Blueprint $table) {
            
            // $table->foreignId('product_id')->index();
            // $table->foreignId('missing_products_id')->index();

            // $table->bigInteger('product_id')->unsigned();
            // $table->bigInteger('missing_products_id')->unsigned();

            // $table->foreign('product_id')
            //     ->references('id')->on('products')
            //     ->onDelete('cascade');

            // $table->foreign('missing_products_id')
            //     ->references('id')->on('missing_products')
            //     ->onDelete('cascade');
            
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
        Schema::dropIfExists('missing_products');
    }
};
