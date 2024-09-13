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
        Schema::create('matched_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('upload_id');
            $table->foreign('upload_id')->references('id')->on('uploads');
            $table->unsignedBigInteger('gallery_image_id');
            $table->foreign('gallery_image_id')->references('id')->on('gallery_images')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matched_images');
    }
};
