<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->string('order_no')->unique();
            $table->string('phone');
            $table->string('card_holder');
            $table->integer('card_no');
            $table->date('exp_date');
            $table->integer('cvc');
            $table->text('address');
            $table->string('state');
            $table->integer('zip');
            $table->integer('total_quantity');
            $table->float('vat');
            $table->float('total_amount');
            $table->float('grand_total');
            $table->string('status')->default('pending');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
