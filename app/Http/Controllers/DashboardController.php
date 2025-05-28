<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\User;

class DashboardController extends Controller
{

    public function index()
    {
        $this->seedRoles();
        $this->seedAdmin();

        return view('dashboard');
    }

    private function seedRoles(){
        $role = Role::firstOrCreate(['name' => 'admin']);
    }

    private function seedAdmin()
    {
        $user = User::find(1);
        if(!$user->roles->count()){
            $user->roles()->attach(1);
        }
    }

}
