<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class UsersListsController extends BaseController
{
    public function index()
    {
        $users = Cache::remember('user.cache',
            now()->addSeconds(60), function (){
            return DB::table('users')->select( 'username',
                'email',
                'total_followers',
                'total_following',
                'total_tweets_posted',
                'link_to_profile',
                'link_to_avatar')->get();
        });

        return $this->sendResponse($users->toArray(), 'Users retrieved successfully.');
    }
}
