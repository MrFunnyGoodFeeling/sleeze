<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Role;
use App\Models\User;

class AdminController extends Controller
{

    public function index(){
        return view('admin.index');
    }

}
