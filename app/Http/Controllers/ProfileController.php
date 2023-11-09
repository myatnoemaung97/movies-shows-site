<?php

namespace App\Http\Controllers;

use App\Rules\MatchNewPassword;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit() {
        return view('profile.edit', [
            'user' => auth()->user()
        ]);
    }

    public function update(Request $request) {
        $attributes = $this->validateProfile($request);

        if (isset($attributes['new_password'])) {
            auth()->user()->update(['password' => $attributes['new_password']]);
        } else {
            auth()->user()->update($attributes);
        }

        return redirect('/profile');
    }

    private function validateProfile(Request $request) {
        if ($request['password']) {
            return $request->validate([
                'old_password' => ['required', new MatchOldPassword],
                'new_password' => 'required',
                'confirm_password' => ['required', new MatchNewPassword]
            ]);
        }

        return $request->validate([
            'username' => 'required',
            'email' => 'required|email'
        ]);
    }
}
