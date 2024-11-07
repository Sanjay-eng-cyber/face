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
            $table->foreignId('cms_user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('cover_image')->nullable();
            $table->longText('descriptions')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->dateTime('link_start_date')->nullable();
            $table->dateTime('link_end_date')->nullable();
            $table->boolean('link_sharing')->default(0)->nullable();
            $table->boolean('is_pin_protection_required')->default(1)->nullable();
            $table->string('pin')->nullable();
            $table->enum('upload_image_quality', ['original', 'compressed'])->default('original')->nullable();
            $table->boolean('guest_images_upload')->default(0)->nullable();
            $table->boolean('single_image_download')->default(0)->nullable();
            $table->boolean('bulk_image_download')->default(0)->nullable();
            $table->boolean('is_watermark_required')->nullable();
            $table->string('watermark_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
