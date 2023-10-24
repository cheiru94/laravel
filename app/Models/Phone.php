<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
        // return $this->belongsTo(User::class,"user_id","id");  이것과 같은 의미!!
    }
}
