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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->unsignedBigInteger('user_id');
            $table->string('email');
            $table->string('phone');
            $table->string('country');
            $table->string('city');
            $table->string('state');
            $table->string('street_address');
            $table->string('zip');
            $table->string('total_price');
            $table->boolean('status')->default('0');
            $table->text('notes')->nullable();
            $table->string('tracking_no');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
