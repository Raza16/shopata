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
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('brand_id')->nullable()->references('id')->on('brands')->onDelete('cascade');
            $table->foreignId('category_id')->nullable()->references('id')->on('categories')->onDelete('cascade');
            $table->string('product_code')->nullable();
            $table->string('status')->default('active');
            $table->string('type');
            $table->string('name');
            $table->string('slug');
            $table->string('product_image')->nullable();
            $table->string('product_video')->nullable();
            // $table->string('product_document')->nullable();
            $table->mediumText('long_description')->nullable();
            $table->text('short_description')->nullable();
            $table->float('regular_price')->nullable();
            $table->float('sale_price')->nullable();
            $table->string('stock');
            $table->integer('quantity')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('item_weight')->nullable();
            $table->string('item_dimension')->nullable();
            $table->string('tax_status')->nullable();
            $table->string('tax_class')->nullable();
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
        Schema::dropIfExists('products');
    }
}
