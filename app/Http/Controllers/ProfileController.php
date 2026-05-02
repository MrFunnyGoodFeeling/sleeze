<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\Avatar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit(): \Illuminate\View\View
    {
        $profile = Auth::user()->profile;
        $avatars = Auth::user()->avatars()->latest()->get();

        return view('profile.edit', compact('profile', 'avatars'));
    }

    public function update(UpdateProfileRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');

            Auth::user()->avatars()->create(['path' => $path]);

            $data['avatar'] = $path;
        } elseif ($request->filled('selected_avatar')) {
            $data['avatar'] = $request->validated()['selected_avatar'];
        }

        Auth::user()->profile()->updateOrCreate(
            ['user_id' => Auth::id()],
            $data,
        );

        return redirect()->route('profile.edit')->with('alertSuccess', 'Profile updated.');
    }

    public function destroyAvatar(Avatar $avatar): \Illuminate\Http\RedirectResponse
    {
        abort_unless($avatar->user_id === Auth::id(), 403);

        $isActive = Auth::user()->profile?->avatar === $avatar->path;

        Storage::disk('public')->delete($avatar->path);
        $avatar->delete();

        if ($isActive) {
            Auth::user()->profile()?->update(['avatar' => null]);
        }

        return redirect()->route('profile.edit')->with('alertSuccess', 'Avatar deleted.');
    }
}
