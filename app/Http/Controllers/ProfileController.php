<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{
    public function index($username)
    {
        $userFromDatabase = DB::table('Users')->where('username', '=', $username)->first();
        return view('profile',[
            'user' => $userFromDatabase
        ]);
    }
}
