<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class IndexUsers extends Component
{
    use WithPagination;

    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 10;

    protected $queryString = [
        'sortField' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
    ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function updateUserRole($userId, $roleName)
    {
        $user = User::find($userId);
        
        if (!$user) {
            return;
        }

        // Prevent stripping admin role from admin users
        if ($user->isAdmin() && $roleName !== 'admin') {
            session()->flash('error', 'Cannot remove admin role from admin users.');
            return;
        }

        // Detach all current roles
        $user->roles()->detach();

        // Attach new role if not guest
        if ($roleName !== 'guest') {
            $role = \App\Models\Role::where('name', $roleName)->first();
            if ($role) {
                $user->roles()->attach($role->id);
            }
        }

        session()->flash('success', 'User role updated successfully.');
    }

    public function render()
    {
        $users = User::query()
            ->with('roles')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.admin.index-users', [
            'users' => $users
        ]);
    }

}
