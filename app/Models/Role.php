<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // User과의 N:M 관계를 정의하는 메서드를 정의하자
    // role_user 테이블에서 role_id가 roles 테이블의 id와 같은 레코드를 찾고 
    // 그 레코드들의 user_id 값을 id값으로 가지는 레코드들을 users 테이블에서 찾는다. 
    // public function users(){
    //   return $this->belongsToMany(User::class); 
    // } 
    // 🟢 위에는 이게 생략된 내용이다.
    public function users(){
      return $this->belongsToMany(User::class,'role_user','role_id','user_id','id','id'); 
    } 
}
