<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;

class ProfilesController extends Controller
{
    public function index($username)
    {
        $userFromDatabase = DB::table('Users')->where('username', '=', $username)->first();
        $user = User::findOrFail($userFromDatabase->id);
        return view('profiles.index',[
            'user' => $user
        ]);
    }
}
