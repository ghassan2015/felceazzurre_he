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
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('smell_product')->nullable();
            $table->text('fragrance')->nullable();
            $table->text('formula')->nullable();
            $table->string('product_image')->nullable();
            $table->text('fragrance_image')->nullable();
            $table->string('formula_image')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('size')->nullable();
            $table->integer('status_cd')->default(1);
            $table->softDeletes();
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
