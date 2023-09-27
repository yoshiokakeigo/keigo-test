<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void {
    Schema::create('objective_assignment', function (Blueprint $table) {
      $table->id();
      $table->foreignId('assignment_id')->nullable()->default(NULL)->constrained('assignments')
        ->cascadeOnDelete();
      $table->foreignId('objective_id')->constrained('objectives')
        ->cascadeOnDelete();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropIfExists('objective_assignment');
  }
};
