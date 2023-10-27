<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory; 

    public function post(){           // _id 이렇게 관례를 맞춰서 작성해주면  생략ㅎ 가능
        // return $this->belongsTo(Post::class,'post_id','id');
        return $this->belongsTo(Post::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
