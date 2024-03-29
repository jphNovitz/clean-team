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
        Schema::create('missing_products', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(true);
            $table->boolean('reported')->default(false);
            $table->integer('quantity')->default(0);

            // $table->bigInteger('product_id')->unsigned();
            // $table->foreign('product_id')
            //     ->references('id')->on('products')
            //     ->onDelete('cascade');

            $table->bigInteger('team_id')->unsigned();
            $table->foreign('team_id')
                ->references('id')->on('teams')
                ->onDelete('cascade');

                $table->foreignId('missing_archives_id')->nullable()->index();
            
                $table->foreignId('product_id')->nullable()->index();
            /* $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('product_id')->unsigned(); */


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
