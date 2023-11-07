<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function phone() { // 사용자 와 phone도 1:1 관계 
        return $this->hasOne(Phone::class);
        // return $this->hasOne(Phone::class,"user_id","id"); 이것과 같은 의미
        // 팅거는 변경된 내용을 적용시켜 주지 않는다....;;
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    // public function latestPost() {
    //    // 이 user가 작성한 posts 중에 id 값이 가장 큰 놈 
    //    return $this->hasOne(Post::class)->latestOfMany();
    // }
   
    public function latestPost() {
      // 이 user가 작성한 posts 중에 id 값이 가장 큰 놈
      return $this->posts()->one()->ofMany('id', 'max');
    }


    public function oldestPost(){
      // 이 user가 작성한 posts 중에 id 값이 가장 작은 놈 
      return $this->hasOne(Post::class)->oldestOfMany();
    }

    // 내가 작성한 게시글의 모든 댓글 가져오기 
    // users --- posts(이거를 기준으로) --- comments
    //  user_id , post_id , id , id    => 원래 이렇게 하나하나 관계 맞춰서 다 작성해야하는데 아래처럼 간단하게 작성 가능하다
    public function postcomments(){ 
      //  여러개의 Comment를 가지는데 Post를 통해서 갖는다
      // 외래키 순서, 주키 순서 
      // return $this->hasManyThrough(Comment::class,Post::class,'user_id', 'post_id' , 'id' , 'id'); //user는 id 칼럼 ,post의 id 칼럼 
      return $this->hasManyThrough(Comment::class,Post::class);
    }

    // 2번 사용자가 작성한 게시글에 대한 모든 댓글들 가져오기.
    //  - 2번 사용자가 작성한 게시글은  5,6,7
    //  - 이 5,6,7 번 게시글에 대한 댓글은 1,2,4,6
}
