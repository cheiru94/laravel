<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Good extends Model
{
    use HasFactory;
    protected $fillable = ['category','name'];

    public function users():BelongsToMany {
      // 비벗테이블 pivot 이 상태 그대로 
      // return $this->belongsToMany(User::class)->withPivot(['ordered_date','amount']);
      
      // as(' ') 피벗테이블 이름 변경!
      return $this->belongsToMany(User::class)
                      ->as('order')
                      ->withPivot(['ordered_date','amount']);
      

    }
}
