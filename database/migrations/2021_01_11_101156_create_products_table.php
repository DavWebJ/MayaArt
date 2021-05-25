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
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->longText('detail')->nullable();
            $table->longText('desc')->nullable();
            $table->integer('price')->default(0);
            $table->integer('price_promos')->default(0);
            $table->string('main_image')->nullable();
            $table->string('video')->nullable();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete('cascade');
            $table->string('meta')->nullable();
            $table->unsignedInteger('stock')->default(0);
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
