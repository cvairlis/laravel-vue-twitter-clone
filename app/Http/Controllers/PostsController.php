<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->latest()->paginate(5);
        return view('posts.index', compact('posts'));
    }

    public function show()
    {
        return view('post');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'body'  => 'required',
        ]);

        auth()->user()->posts()->create($data);

        return redirect('/home');

    }
}
