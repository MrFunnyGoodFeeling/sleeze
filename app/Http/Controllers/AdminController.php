<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\User;
use App\Models\UserAvatar;
use App\Models\UserProfile;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index(){
        return view('admin.index');
    }

    public function users()
    {
        $users = User::latest()->paginate(10);

        return view('admin.users', [
            'users' => $users,
        ]);
    }

}
