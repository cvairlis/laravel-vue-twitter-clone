<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersListsController extends BaseController
{
    public function index()
    {
        $users = User::all(
            'username',
            'email',
            'total_followers',
            'total_following',
            'total_tweets_posted',
            'link_to_profile',
            'link_to_avatar'
            );

        return $this->sendResponse($users->toArray(), 'Users retrieved successfully.');
    }
}
