<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use DB;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    public static function getAllAdminsPlayer() {
        return \DB::table('users as u')
            ->select('u.role')
            ->whereRaw("(u.role = 'admin'")
            ->get();
    }
}
