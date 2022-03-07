<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create() {

        return view('auth.register');
    }

    public function store() {

        $this->validate(request(), [
            'name' => 'required',
            'role'  => 'string',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        
        $user = User::create(request(['name', 'role', 'email', 'password']));

        if (auth()->login($user) == 'admin') {
            return view('admin.index');
        } else {
            return redirect()->to('/login');
        }
    }
}
