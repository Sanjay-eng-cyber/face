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
            $table->string('slug');
            $table->string('cover_image')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->longText('descriptions')->nullable();
            $table->enum('download_size', ['original', '1600'])->default('original');
            $table->boolean('sharing')->default(0);
            $table->boolean('visibility')->default(1);
            $table->boolean('single_image_download')->default(1);
            $table->boolean('bulk_image_download')->default(1);
            $table->boolean('email_registration')->nullable();
            $table->boolean('social_sharing_buttons')->nullable();
            $table->boolean('print_store')->nullable();
            $table->boolean('mobile_field')->nullable();
            $table->boolean('guest_upload')->nullable();
            $table->boolean('password_protection')->nullable();
            $table->string('password')->nullable();
            $table->boolean('share_image')->nullable();
            $table->boolean('watermark')->nullable();
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
