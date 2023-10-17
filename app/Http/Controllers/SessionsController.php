<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create() {
        return view('sessions.create');
    }

    public function store(Request $request) {
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($attributes)) {
            return back()->withInput()->withErrors(['email' => 'Your credentials failed']);
        }

        session()->regenerate();

        return redirect('/');
    }

    public function destroy() {
        auth()->logout();

        return redirect('/');
    }
}
