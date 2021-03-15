<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string("first_name");
            $table->string("last_name");
            $table->string('username')->unique();
            $table->string('mobile')->unique();
            $table->string('image')->nullable();
            $table->string("country");
            $table->string("city");
            $table->string("state")->nullable();
            $table->string("postal_code")->nullable();
            $table->string("company_name")->nullable();
            $table->string("company_logo")->nullable();
            $table->string("company_address");
            $table->integer('status')->default(1);
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sellers');
    }
}
