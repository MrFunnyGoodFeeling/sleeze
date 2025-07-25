<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAvatar extends Model
{

    protected $table = 'user_avatars';

    protected $fillable = [
        'user_id',
        'data',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
