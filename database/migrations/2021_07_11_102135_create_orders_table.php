<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('subtotal');
            $table->decimal('discount')->default(0);
            $table->decimal('total');
            $table->dateTime('order_at');
            $table->enum('status',['en cours','preparer','expedier','annuler'])->default('en cours');
            $table->string('prenom');
            $table->string('nom');
            $table->string('email');
            $table->string('adresse');
            $table->string('ville');
            $table->string('zip');
            $table->string('pays');
            $table->boolean('is_shipping_different')->default(false);
            $table->foreignId('shipping_id')->nullable()->constrained('shippings');
            $table->foreignId('billing_id')->constrained('billings');
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
        Schema::dropIfExists('orders');
    }
}
