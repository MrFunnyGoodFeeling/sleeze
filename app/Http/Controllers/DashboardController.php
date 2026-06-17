<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\User;
use App\Models\UserProfile;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function home()
    {
        $this->seed();

        $profile = UserProfile::firstOrCreate(['user_id' => Auth::id()]);

        return view('dashboard.home');
    }

    public function profile()
    {
        $profile = UserProfile::firstOrCreate(['user_id' => Auth::id()]);

        return view('users.profile', compact('profile'));
    }

    public function editProfile()
    {
        $profile = UserProfile::firstOrCreate(['user_id' => Auth::id()]);

        return view('users.edit-profile', compact('profile'));
    }

public function settings(): \Illuminate\View\View
    {
        return view('users.settings');
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
