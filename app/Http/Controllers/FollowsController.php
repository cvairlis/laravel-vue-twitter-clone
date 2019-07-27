<?php

namespace App\Http\Controllers;

use App\Notifications\UserFollowed;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class FollowsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(User $user)
    {
        $toggle = auth()->user()->following()->toggle($user->profile);

        Self::updateUsersTotalFollowing(auth()->user());
        Self::updateUsersTotalFollowers($user);

        return $toggle;
    }

    private function updateUsersTotalFollowing(User $user)
    {
        $data = [
            'total_following' => $user->following->count(),
        ];

        return $user->update($data);
    }

    private function updateUsersTotalFollowers(User $user)
    {
        $data = [
            'total_followers' => $user->profile->followers->count(),
        ];

        return $user->update($data);
    }
}
