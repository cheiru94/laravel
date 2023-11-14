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
        
      Schema::table('role_user', function(Blueprint $table){
         // 1.roles 테이블의 주키를 참조하는 외래키 칼럼
         $table->foreignId('role_id')->constrained()->onUpdate('cascade')->onUpdate('cascade');
         // 2.users 테이블의 주키를 참조하는 외래키 칼럼 
         $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns('role_user', ['role_id', 'user_id']);
    }
};
