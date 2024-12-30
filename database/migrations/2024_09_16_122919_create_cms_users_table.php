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
        Schema::create('cms_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('role', ['admin', 'super-admin']);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('custom_domain_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('portfolio_website')->nullable();
            $table->longText('bio')->nullable();
            $table->string('vimeo_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('max_events')->nullable();
            $table->string('max_image_size')->nullable();
            $table->string('max_images_count')->nullable();
            $table->string('max_face_search')->nullable();
            $table->string('max_storage_limit')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_users');
    }
};
