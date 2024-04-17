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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name',150);
            $table->text('description');
            $table->string('path_img');
            $table->date('date');
            $table->string('location' , 250);
            $table->enum('status_event',['active','inactive','finished']);
            $table->date('event_date'); 
            $table->time('event_start');
            $table->time("event_finish");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
