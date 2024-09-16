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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cms_user_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('event_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->boolean('sharing')->default(0);
            $table->boolean('visibility')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
