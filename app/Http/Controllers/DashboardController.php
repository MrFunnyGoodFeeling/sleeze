<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function home()
    {
        $this->seed();

        return view('dashboard.home');
    }

    private function seed()
    {
        $roles = Role::all();
        if ($roles->isEmpty()) {
            $role = Role::create(['name' => 'admin']);
            Auth::user()->roles()->attach($role->id);
            $role = Role::create(['name' => 'member']);
        }
    }
}
