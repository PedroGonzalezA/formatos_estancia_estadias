<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{

    public function create() {
        
        return view('auth.login');
    }

    public function store() {

        if(auth()->attempt(request(['name', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'El correo electrónico o la contraseña son incorrectos, intente nuevamente'
            ]);
        } else {

            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.index');
            } else {
                return redirect()->to('/inicio');
            }
        }
    }

    public function destroy() {

        auth()->logout();

        return redirect()->to('/');
    }
}
