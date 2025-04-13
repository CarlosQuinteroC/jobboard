<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }
    public function store(){

        $validatedAttributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'role'     => ['required', 'in:poster,viewer'],
            'password' => ['required', Password::min(8), 'confirmed'],
        ]);
        //create user
        $user = User::create($validatedAttributes);
        //log in
        Auth::login($user);
        return redirect('/');
    }
}
