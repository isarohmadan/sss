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
        Schema::create('ticket_transactions', function (Blueprint $table) {
            $table->bigIncrements('ticket_transaction_id');
            
            $table->integer('quantity');
            $table->integer('total_price');
            $table->enum('status', ['pending', 'success', 'cancel']);
            $table->string('payment_url');
            $table->string('payment_type');
            $table->string('payment_code');
            $table->timestamp('transaction_time');
            $table->timestamps();
            // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_transactions');
    }
};
