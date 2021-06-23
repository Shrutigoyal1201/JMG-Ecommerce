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
            $table->string('category_id')->nullable();
            $table->string('subcategory_id')->nullable();
            $table->string('disease')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_description')->nullable();
            $table->string('product_image');
            $table->string('product_price')->nullable();
            $table->string('product_quantity')->nullable();
            $table->string('featured_product')->default(0);
            $table->string('popular_product')->default(0);
            $table->string('latest_product')->default(0);
            $table->string('status')->default(1);

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
