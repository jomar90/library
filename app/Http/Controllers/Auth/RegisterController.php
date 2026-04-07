<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'first_name' => ['required'],
            'last_name'  => ['required'],
            'email'      => ['required', 'email'],
            'password'   => ['required', 'string', 'confirmed']
        ]);

        $attributes['password'] = Hash::make($attributes['password']);

        $user = User::create($attributes);


        event(new Registered($user));

        Auth::login($user);

        return redirect('/books');
    }
}
