<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['user_id', 'path'])]
class UserAvatar extends Model
{

    protected $table = 'user_avatars';

    public function user(){
        return $this->belongsTo(User::class);
    }

}
