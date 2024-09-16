<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
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
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->longText('descriptions')->nullable();
            $table->enum('download_size', ['original', '1600'])->default('original');
            $table->boolean('sharing')->default(0);
            $table->boolean('visibility')->default(1);
            $table->boolean('single_image_download')->default(1);
            $table->boolean('bulk_image_download')->default(1);
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
