<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersListsController extends BaseController
{
    public function index()
    {
        $users = User::all();

        return $this->sendResponse($users->toArray(), 'Users retrieved successfully.');
    }
}
