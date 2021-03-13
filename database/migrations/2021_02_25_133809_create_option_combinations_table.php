<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionCombinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_combinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_v_o_id')->references('id')->on('product_variatons')->onDelete('cascade');
            $table->foreignId('sku_id')->references('id')->on('skus')->onDelete('cascade');
            $table->float('price')->default(0);
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
        Schema::dropIfExists('option_combinations');
    }
}
