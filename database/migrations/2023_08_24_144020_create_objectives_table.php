<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void {
    Schema::create('objectives', function (Blueprint $table) {
      $table->id();
      //ユーザーとの紐付け
      $table->unsignedBigInteger('user_id');
      $table->foreign('user_id')->references('id')->on('users');
      //最小目標$
      $table->text('assignment_min_text');
      //最大目標
      $table->text('assignment_max_text');
      //起こりうる未達成要素
      $table->text('not_actived_text');
      //対策コメント
      $table->text('measures_text');
      //具体的な戦略コメント
      $table->text('specific_text');
      //振り返りコメント
      $table->text('review_text')->nullable();
      $table->unsignedBigInteger('team_id');
      $table->foreign('team_id')->references('id')->on('teams');
      $table->unsignedBigInteger('month_id');
      $table->foreign('month_id')->references('id')->on('months');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropIfExists('objectives');
  }
};
