<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\User;
use App\Models\UserAvatar;
use App\Models\UserProfile;

use Illuminate\Support\Facades\Auth;

class Profile extends Component
{

    use WithFileUploads;

    public function mount()
    {
        $this->user = Auth::user();
        $this->fetchProfile();
    }

    public $user;
    public $profile;
    public $avatar;

    public $newNickname = "";
    public $newTitle = "";
    public $newAbout = "";
    public $newAvatar;

    public $alertInfo = "";
    public $alertSuccess = "";
    public $alertWarning = "";
    public $alertDanger = "";

    public function render(){
        return view('livewire.dashboard.profile');
    }

    public function fetchProfile()
    {
        $this->profile = UserProfile::where('user_id', $this->user->id)->first();
        $this->newNickname = $this->profile->nickname;
        $this->newTitle = $this->profile->title;
        $this->newAbout = $this->profile->about;
        $this->avatar = $this->profile->avatar;
    }

    public function update()
    {
        $this->reset(['alertInfo', 'alertSuccess', 'alertWarning', 'alertDanger']);

        $this->validate([
            'newNickname' => 'nullable|string|max:255',
            'newTitle' => 'nullable|string|max:255',
            'newAbout' => 'nullable|string|max:255',
            'newAvatar' => 'nullable|mimes:jpeg,jpg,png,webp|max:1024',
        ], [
            'newNickname.max' => 'Max 255 characters.',
            'newTitle.max' => 'Max 255 characters.',
            'newAbout.max' => 'Max 255 characters.',
            'newAvatar.image' => 'Invalid image.',
            'newAvatar.mimes' => 'Invalid image type. Accepted: jpeg, jpg, png, webp.',
            'newAvatar.max' => 'Max image file size: 1MB.',
        ]);

        $this->profile->nickname = !empty($this->newNickname) ? $this->newNickname : null;
        $this->profile->title = !empty($this->newTitle) ? $this->newTitle : null;
        $this->profile->about = !empty($this->newAbout) ? $this->newAbout : null;

        if(!empty($this->newAvatar))
        {
            $avatar = UserAvatar::create([
                'user_id' => $this->user->id,
                'data' => $this->newAvatar->store('photos', 'public'),
            ]);
            $this->profile->avatar = $avatar->data;
        }

        if($this->profile->isDirty())
        {
            $this->profile->save();
            $this->alertSuccess = "Profile updated.";
        }
        else{
            $this->alertWarning = "Nothing to update.";
        }

        $this->reset('newAvatar');
        $this->fetchProfile();
    }

}
