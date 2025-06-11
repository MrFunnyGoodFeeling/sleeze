<?php

namespace App\Livewire\User;

use Livewire\Component;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Settings extends Component
{

    public function mount(){
        $this->user = Auth::user();
    }

    public $user;

    public $currentPassword;
    public $newPassword;
    public $passwordConfirmation;

    public $alertInfo = "";
    public $alertSuccess = "";
    public $alertWarning = "";
    public $alertDanger = "";

    public function render(){
        return view('livewire.user.settings');
    }

    public function update()
    {
        $this->reset(['alertInfo', 'alertSuccess', 'alertWarning', 'alertDanger']);

        // Validate the form
        $this->validate([
            'currentPassword' => 'required|string',
            'newPassword' => 'required|string|min:8',
            'passwordConfirmation' => 'required|string|same:newPassword',
        ], [
            'currentPassword.required' => 'Current password is required.',
            'newPassword.required' => 'New password is required.',
            'newPassword.min' => 'New password must be at least 8 characters.',
            'passwordConfirmation.required' => 'Password confirmation is required.',
            'passwordConfirmation.same' => 'Password confirmation does not match.',
        ]);

        // Check if current password is correct
        if(!Hash::check($this->currentPassword, $this->user->password))
        {
            $this->addError('currentPassword', 'Current password is incorrect.');
            return;
        }

        // Update password
        $this->user->update([
            'password' => Hash::make($this->newPassword)
        ]);

        // Clear form fields
        $this->reset(['currentPassword', 'newPassword', 'passwordConfirmation']);

        // Set success message
        $this->alertSuccess = 'Password updated.';
    }

}
