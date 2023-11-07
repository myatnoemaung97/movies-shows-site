<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
}
