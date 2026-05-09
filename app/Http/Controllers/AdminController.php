<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.index', [
            'password' => $this->generatePassword(),
        ]);
    }

    public function generatePassword()
    {
        $string = "QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm0123456789";

        return substr(str_shuffle($string), 0, 10);
    }

}
