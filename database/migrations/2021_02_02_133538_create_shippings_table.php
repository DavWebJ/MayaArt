<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->tinyInteger('shipping_numero')->nullable();
            $table->string('shipping_adress');
            $table->string('shipping_zip');
            $table->string('shipping_city');
            $table->tinyInteger('billing_numero')->nullable();
            $table->string('billing_adress');
            $table->string('billing_zip');
            $table->string('billing_city');
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
        Schema::dropIfExists('shippings');
    }
}
