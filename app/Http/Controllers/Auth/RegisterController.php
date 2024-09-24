<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(): View
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        $userData = [
            'name'     => $request->input('name'),
            'username' => $request->input('username'),
            'email'    => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ];

        try {
            $user = User::create($userData);

            event(new Registered($user));

            Auth::login($user);

            $request->session()->regenerate();

            return redirect()->to('/');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['email' => 'Registration failed. Please try again later.']);
        }
    }
}
