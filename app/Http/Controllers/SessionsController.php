<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;

class SessionsController extends Controller
{
    public function store(Request $request) {
        try {
            $attributes = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if (!auth()->attempt($attributes)) {
                return response()->json(['errors' => [
                    'email' => 'Your credentials failed'
                ]]);
            }

            session()->regenerate();

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()]);
        }
    }

    public function destroy() {
        auth()->logout();

        return redirect('/');
    }

    public function github() {
        return Socialite::driver('github')
            ->scopes(['email'])
            ->redirect();
    }

    public function githubRedirect() {
        $user = Socialite::driver('github')->user();

        $user = User::firstOrCreate([
            'email' => $user->email
        ], [
            'username' => $user->nickname,
            'password' => Str::random(10)
        ]);

        auth()->login($user);

        return redirect('/');

    }
}
