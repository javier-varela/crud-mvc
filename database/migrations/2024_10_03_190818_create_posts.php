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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 500);
            $table->string('slug', 500);
            $table->string('description', 500);
            $table->text('content');
            $table->string('image_url', 500)->nullable();
            $table->boolean('published')->default(false);
            $table->timestamps();

            $table->foreignId('category_id')->constrained('categories')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
