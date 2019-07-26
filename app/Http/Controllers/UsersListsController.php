<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersListsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->paginate(5);
        return view('users.index', compact('users'));
    }
}
