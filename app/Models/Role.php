<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name'])]
class Role extends Model
{

    protected $table = 'roles';

    public function users(){
        return $this->belongsToMany(User::class);
    }

}
