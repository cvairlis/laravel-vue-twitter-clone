<?php

namespace App\Http\Controllers;

use App\Mail\UserFollowedMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(User $user){
        return Mail::to($user->email)->send(new UserFollowedMail());
    }
}
