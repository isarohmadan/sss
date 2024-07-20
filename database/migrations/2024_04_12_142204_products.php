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
        
        Schema::create('vinyl', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('label');
            $table->date('release_year');
            $table->text('artist');
            $table->integer('stock')->unsigned()->default(0);
            $table->enum('condition', ['used', 'new']);
            $table->enum('size', [8, 10, 12]);
            $table->integer('price')->unsigned();
            $table->text('genre')->nullable();
            $table->timestamps();
        });

        Schema::create('merch_category', function (Blueprint $table) {
            $table->id('id_category');
            $table->string('name_category');
            $table->string('slug_category');
            $table->text('description');
            $table->timestamps();
        });
        
        Schema::create('merch', function (Blueprint $table) {
            $table->uuid('id_merch')->primary();
            $table->string('title');
            $table->string('slug_merch');
            $table->text('description');
            $table->text('tag');
            $table->string('merch_cover_front');
            $table->string('merch_cover_back');
            $table->integer('price')->nullable();
            $table->json('merch_size')->nullable();
            $table->foreignId('category_id')->nullable()->constrained()->references('id_category')->on('merch_category')->onDelete('set null');
            $table->timestamps();
        });
        
        



        // Schema::create('merch_size', function(Blueprint $table){
        //     $table->id();
        //     $table->foreignId('merch_id')->constrained()->references('id')->on('merch')->onDelete('cascade'); 
        //     $table->string('name');
        //     $table->unsignedBigInteger('stock')->default(0);
        //     $table->timestamps();
        // });
                              
        Schema::create('product_vinyl_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vinyl_id')->constrained()->references('id')->on('vinyl'); 
            $table->string('image_path');
            $table->timestamps();
        });

        Schema::create('vinyl_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vinyl_id')->constrained()->references('id')->on('vinyl');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('quantity')->unsigned();
            $table->decimal('total_price', 8, 2);
            $table->enum('status', ['pending', 'success', 'cancel']);
            $table->string('payment_url');
            $table->string('payment_type');
            $table->string('payment_code');
            $table->timestamp('transaction_time');
            $table->timestamps();
        });
        
        // Schema::create('merch_transactions', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('merch_id')->constrained()->references('id')->on('merch');
        //     $table->unsignedBigInteger('user_id');
        //     $table->foreign('user_id')->references('id')->on('users');
        //     $table->integer('quantity')->unsigned();
        //     $table->decimal('total_price', 8, 2);
        //     $table->string('payment_url');
        //     $table->string('payment_type');
        //     $table->string('payment_code');
        //     $table->timestamp('transaction_time');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vinyl');
        Schema::dropIfExists('merch');
        Schema::dropIfExists('product_vinyl_images');
        // Schema::dropIfExists('product_merch_images');
        Schema::dropIfExists('vinyl_transactions');
        // Schema::dropIfExists('merch_transactions');
        Schema::dropIfExists('merch_category');
        // Schema::dropIfExists('merch_size');
    }
};
