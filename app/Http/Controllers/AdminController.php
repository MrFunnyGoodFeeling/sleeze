<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Role;
use App\Models\User;
use App\Models\UserAvatar;
use App\Models\UserProfile;

class AdminController extends Controller
{

    public function index(){
        return view('admin.index');
    }

}
