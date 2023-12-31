<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void {
    Schema::create('article_images', function (Blueprint $table) {
      $table->foreignId('article_id')->constrained('articles')
        ->cascadeOnDelete();
      $table->foreignId('image_id')->constrained('images')
        ->cascadeOnDelete();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropIfExists('article_images');
  }
};
