<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


/*
    🟢 php artisan migrate -> 테이블을 생성하는 명령어다 🟢  
    
    마이그레이션 파일에 정의된 대로 데이터베이스 스키마를 변경합니다. 
    이러한 변경사항 중 하나가 새로운 테이블을 생성하는 것입니다.

    따라서 마이그레이션 파일에서 Schema::create() 함수를 사용해 새 테이블을 정의하고, 
    이 마이그레이션 파일을 php artisan migrate 명령어로 실행하면 실제 데이터베이스에 해당 테아블을 생성합니다.

    하지만 php artisan migrate 명령어는 단순히 테아블 생성뿐만 아니라 
    다른 여러 가지 데이터베으시 변경 작업도 수행할 수 있습니다. 
    예를 들면, 기존 테아블의 칼럼 추가/수정/삭제, 인덱스 추가/삭제 등 
    다양한 데이터베으시 스키마 변경 작업들도 이 명령어를 통해 수행됩니다.

*/


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    //  ✏️ php artisan migrate 명령어가 실행되면 up 메소드가 실행된다 
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
             /* 🟢 추가할 컬럼들 작성 🟢 */
            // UnsignedBigInt 타입의 auto_increament primary key id컬럼 생성.
            $table->id(); 
            $table->string("name");  /* name이라는 칼럼을 문자열 저정할 수 있는 타입으로 만들어라 */
            $table->string("airline");  /* airline이라는 칼럼을 문자열 저정할 수 있는 타입으로 만들어라 */

            // datatime 데이타 타입으로 created_at, updated_at 이라는 두개의 칼럼을 만들어 준다.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    // ✏️ php artisan migrate::rollback 명령어가 실행되면 up 메소드가 실행된다
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
