<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{

    protected $table = 'user_profiles';

    protected $fillable = [
        'user_id',
        'nickname',
        'title',
        'avatar',
        'about',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
