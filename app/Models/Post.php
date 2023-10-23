<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model // 모델이 만들어졌고 이 객체를 통해 인스턴스를 만들면 db에 넣을 수 있다. 
{
    use HasFactory; // post 모델 만들 때 erm 자동으로 만들어준다

    // 추가로 이렇게 명시적으로 $table속성을 지정해도 된다.

  // 만약에 테이블 이름과 일치 하지 않을 때는 이렇게 명시적으로 연결을 해줘야 한다. 
  // protected $table = 'posts';    // => 🟢posts 테이블과 연결 된다


  //🟢$fillable은 create로 등록할 때 사용한다
  // 이렇게 작성해 놓아야 crete에 연관 배열로 값을 넘겨 줄 수 있다.
  // create 메서드로 레코드를 생성할 때, 명시할 수 있는 칼럼


  /* 
      대량 할당을 사용할 때, 개발자가 허용하는 칼럼 값만 취해서 레코드로 생성하기 위해
      예를 들어 , request에 create_at,updated_at 값이 있어도 그에 해당하는
      칼럼이 posts 테이블에 존재하지만, 그 값은 취하지 않고 레코드를 생성한다. 
      
      어떤 나쁜놈에 의해 내가 원하지 않는 컬럼 값까지 생성할 까봐 막아주는 것이다. 
    */


  // update는 모델 클래스의 화이트 리스트와 블랙 리스트를 참조하지 않는다!!!
  // 연관 배열에 있는 모든 키를 변경할 칼럼 이름으로 간주하고 update문을 생성해 실행한다.
  protected $fillable = ['title', 'content', 'user_id']; // ⚪허용하는 칼럼들 : 화이트 리스트

  // protected $garded = ['created_at', 'updated_at']; // ⚫허용하지 않는 칼럼들 : 블래 리스트
  // 블랙 리스트에 없는 거 배고 걍 전부 다 만든다... _token도 만들어 버린다.
}
