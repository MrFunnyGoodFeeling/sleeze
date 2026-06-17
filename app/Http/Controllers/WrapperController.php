<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WrapperController extends Controller
{

    public function landing(){
        return view('wrapper.landing');
    }

}
