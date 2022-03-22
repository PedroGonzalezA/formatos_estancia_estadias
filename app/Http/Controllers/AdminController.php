<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {

        $data = [
            'usersCount'  => Users::count(),
            'adminsCount' => Users::where('role', 'admin')->count()
        ];

        return view('admin.index', $data);
    }
    public function ver(){
       
        return view('admin.editar_admin');
    }
    
    public function editar(Request $request){
        $this->validate(request(), [
            'password' => 'required'
        ]);
        $userID=Auth::user()->id;
        $user=User::find($userID);
        $user->password=request('password');
        $user->save();
        return redirect()->to('/admin')->with('success','Contraseña cambiada');
    }
}
