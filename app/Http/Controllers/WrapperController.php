<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class WrapperController extends Controller
{

    public function landing()
    {
        if(Auth::check()){
            return redirect('/dashboard');
        }
        else{
            return view('wrapper.landing');
        }
    }

}
