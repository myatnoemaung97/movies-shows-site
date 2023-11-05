<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(Request $request) {
        $user = User::create([
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ]);

        auth()->login($user);

        return redirect('/');
    }
}
