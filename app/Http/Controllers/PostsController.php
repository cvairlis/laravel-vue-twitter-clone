<?php

namespace App\Http\Controllers;

use App\Post;
use Intervention\Image\Facades\Image;

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
        $data = $this->validateRequest();

        $path='';
        if (request('image')) {
            $path = request('image')->store('uploads','public');
            $image = Image::make(public_path("storage/{$path}"  ))->fit(500,250);
            $image->save();
        }

        auth()->user()->posts()->create([
            'body' => $data['body'],
            'image' => $path,
        ]);

        return redirect('/home');
    }

    private function validateRequest()
    {
        return request()->validate([
            'body' => ['required','max:140'],
            'image' => ['image','mimes:jpg,jpeg,bmp,png','max:1024'],
        ],[
            'image.max' => 'The image size must not be greater than 1MB.',
        ]);
    }
}
