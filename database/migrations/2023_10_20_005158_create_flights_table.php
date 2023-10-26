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
        // 🍑 Schema::create(테이블이름 , 테이블 구조정의 하는 클로저 ) 🍑 
        Schema::create('flights', function (Blueprint $table) {// 무명함수 : 클로저  -> 자동으로 생성되는 이 클로저 함수가 실행 되어서 flights 라는 테이블을 만들어 준다
             /* 🟢 추가할 컬럼들 작성 🟢 */
           
             // 라라벨에서는 기본으로 notnull이다
             //table은 위의 function 함수 안에 있다 (무명함수)
            $table->id();  // 프라이머리 키로 생성 ->  UnsignedBigInt(무조건 양수로 저장된다) 타입의 auto_increament primary key id컬럼 생성.
            $table->string("name");  /* name이라는 칼럼을 문자열 저정할 수 있는 타입으로 만들어라 */
            $table->string("airline");  /* airline이라는 칼럼을 문자열 저정할 수 있는 타입으로 만들어라 */

            // datatime 데이타 타입으로 created_at, updated_at 이라는 두개의 칼럼을 만들어 준다.
            $table->timestamps();// 만들어지는 테이블에 2개의 칼럼을 추가 시킨다.    1.created_at:레코드가 삽입되는 시간  2.updated_at:레코드가 변경되는 시간  => 자동으로 생성해 준다. 이렇게 2개를 만들어 주기 때문에 끝에 s가 붙는다 
        });
    }
       // 테이터 타입을 칼럼마다 다르게 주는 이유는?
       // => 타입에 맞는 연산을 하기 위해서이다. 숫자는 숫자 끼리, 날짜는 날짜끼리


    /**
     * Reverse the migrations.
     */
    // ✏️ php artisan migrate::rollback 명령어가 실행되면 up 메소드가 실행된다
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
