<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Role;
use App\Models\User;
use App\Models\UserProfile;

class DashboardController extends Controller
{

    public function home()
    {
        $this->seed();

        return view('dashboard.home');
    }

    public function profile()
    {
        $profile = UserProfile::firstOrCreate(['user_id' => Auth::id()]);

        return view('dashboard.profile');
    }

    public function settings(){
        return view('dashboard.settings');
    }

    private function seed()
    {
        $roles = Role::all();
        if($roles->isEmpty())
        {
            $role = Role::create(['name' => 'admin']);
            Auth::user()->roles()->attach($role->id);
            $role = Role::create(['name' => 'member']);
        }
    }

}
