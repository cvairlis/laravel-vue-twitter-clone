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
        /*
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
        */

        $array = array();

        $users = Cache::remember('user.cache',
            now()->addSeconds(60), function (){
                $users = User::all();
                foreach ($users as $user) {
                    $array[] = array(
                        'usename' => $user->username,
                        'email' => $user->email,
                        'total_followers' => $user->profile->followers->count(),
                        'total_following' => $user->following->count(),
                        'total_tweets_posted' => $user->posts->count(),
                        'link_to_user_profile' => request()->root().'/profile/'.$user->username,
                        'link_to_user_avatar' => request()->root().'/storage/'.$user->profile->image,
                    );
                }

                return $array;
            });


        return $this->sendResponse($users, 'Users retrieved successfully.');
    }
}
