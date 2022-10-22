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
        Schema::create('missing_products_ids_archive', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 30);
            $table->bigInteger('team_id');
            $table->string('ids', 255);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('missing_products_ids_archive');
    }
};
