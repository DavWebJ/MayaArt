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
            $table->text('detail')->nullable();
            $table->longText('desc')->nullable();
            $table->integer('price')->default(0);
            $table->integer('price_promos')->default(0);
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete()->cascadeOnUpdate();;
            $table->string('vignette1')->nullable();
            $table->string('alt1')->nullable();
            $table->string('vignette2')->nullable();
            $table->string('alt2')->nullable();
            $table->string('vignette3')->nullable();
            $table->string('alt3')->nullable();
            $table->string('vignette4')->nullable();
            $table->string('alt4')->nullable();
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
