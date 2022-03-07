<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {

        $data = [
            'usersCount'  => Users::count(),
            'adminsCount' => Users::where('role', 'admin')->count()
        ];

        return view('admin.index', $data);
    }
}
