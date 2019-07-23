<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersListController extends Controller
{
    public function show()
    {
        return view('users');
    }
}
