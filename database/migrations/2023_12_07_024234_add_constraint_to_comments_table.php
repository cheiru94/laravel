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
    Schema::table('comments', function (Blueprint $table) {
      // add_constraint_to_comments_table로 테이블 작성
      $table->unsignedInteger('post_id')->nullable(true)->chage(); // 만들어진 스키마에 제약 조건을 변경할 때 이렇게 사용한다.
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('comments', function (Blueprint $table) {
      //
    });
  }
};
