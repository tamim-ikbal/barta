<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show($username): View
    {
        $user = User::where('username', $username)->firstOrFail();

        return view('profile.show', compact('user'));
    }

    public function edit(): View
    {
        $user = Auth::user();

        return view('profile.edit', compact('user'));
    }

    public function update(ProfileUpdateRequest $request, $username): RedirectResponse
    {
        $user = Auth::user();

        $profileData = [
            'name'  => $request->input('name'),
            'email' => $request->input('email'),
        ];

        if ( ! empty($request->input('password'))) {
            $profileData['password'] = Hash::make($request->input('password'));
        }

        if ( ! empty($request->input('bio'))) {
            $profileData['bio'] = $request->input('bio');
        }

        try {
            $user->update($profileData);

            return redirect()->route('profile.edit');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['email' => 'Profile update failed. Please try again later.']);
        }

    }

}
