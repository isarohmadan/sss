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
        Schema::create('sss_gallery_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('slug');
            $table->string('image_cover_path');
            $table->timestamps();
        });
        Schema::create('sss_gallery_images', function (Blueprint $table) {
        $table->uuid('id_image')->primary();
            $table->string('title');
            $table->foreignId('sss_gallery_category_id')->constrained()->references('id')->on('sss_gallery_categories')->onDelete('cascade');
            $table->string('image_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sss_gallery_categories');
        Schema::table('sss_gallery_images', function (Blueprint $table) {
            $table->dropForeign(['sss_gallery_category_id']);
            $table->dropColumn('gallery_sss_id');
        });
    }
};
