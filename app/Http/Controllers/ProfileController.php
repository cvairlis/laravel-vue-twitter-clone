<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($username)
    {
        return view('profile',[
            'user' => Auth::user()
        ]);
    }
}
