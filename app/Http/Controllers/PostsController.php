<?php

namespace App\Http\Controllers;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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
