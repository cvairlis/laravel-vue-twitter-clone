<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;

class ProfilesController extends Controller
{
    public function index($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        $posts=$user->posts()->paginate(5);
        return view('profiles.index',[
            'user' => $user,
            'follows' => $follows,
            'posts' => $posts,
        ]);
    }
}
