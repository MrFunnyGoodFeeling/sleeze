<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['user_id', 'nickname', 'title', 'avatar', 'location', 'about'])]
class UserProfile extends Model
{

    protected $table = 'user_profiles';

    public function user(){
        return $this->belongsTo(User::class);
    }

}
