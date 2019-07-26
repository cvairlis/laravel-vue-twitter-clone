<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function findUserFromUsername($username){
        return User::where('username', $username)->firstOrFail();
    }

    public function index($username)
    {
        $user = $this->findUserFromUsername($username);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        $posts=$user->posts()->paginate(5);
        return view('profiles.index',[
            'user' => $user,
            'follows' => $follows,
            'posts' => $posts,
        ]);
    }

    public function edit($username)
    {
        $user = $this->findUserFromUsername($username);
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update($username)
    {
        $user = $this->findUserFromUsername($username);
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ['image','mimes:jpg,jpeg,bmp,png','max:1024'],
        ],[
            'image.max' => 'The image size must not be greater than 1MB.',
        ]);

        if (request('image')) {
            $path='';
            $path = request('image')->store('profile','public');
            $image = Image::make(public_path("storage/{$path}"  ))->fit(250,250);
            $image->save();
            auth()->user()->profile->update(array_merge(
                $data, ['image' => $path]
            ));
        }
        else
        {
            auth()->user()->profile->update($data);
        }

        return redirect("/profile/{$user->username}");
    }
}
