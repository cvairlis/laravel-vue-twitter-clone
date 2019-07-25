@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <h3><strong>User profile</strong></h3>
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center h-100">
                            <div class="col-md-6 mx-auto">
                                User: <strong>{{ $user->username }}</strong>
                            </div>
                            <div class="col-md-6 text-right">
                                @if (Auth::id() != $user->id)
                                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                                @else
                                    @can('update', $user->profile)
                                        <a href="/profile/{{ $user->username }}/edit" class="btn btn-primary ml-4">Edit profile</a>
                                    @endcan
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center h-100">
                            <div class="col-md-4 text-center">
                                <img src="/storage{{ $user->profile->image() }}" class="rounded-circle" width="135">
                            </div>
                            <div class="col-md-8">
                                <div>Email: <strong>{{ $user->email }}</strong></div>
                                <div>Title: <strong>{{ $user->profile->title }}</strong></div>
                                <div>Description: <strong>{{ $user->profile->description }}</strong></div>
                                <div class="row h-100 justify-content-center align-items-center text-center pt-4">
                                    <div>Total tweets: <br><strong> {{ $user->posts->count() }}</strong></div>
                                    <div class="pl-2">Total followers: <br><strong> {{ $user->profile->followers->count() }} </strong></div>
                                    <div class="pl-2">Total following: <br><strong> {{ $user->following->count() }} </strong></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center pt-4">
            <div class="col-lg-7">
                <h3><strong>List of Tweets</strong></h3>
            </div>
        </div>

        @foreach ($posts as $post)
        <div class="row justify-content-center pt-2">
            <div class="col-lg-7">
                <div class="card mb-4">
                    <div class="card-header d-flex flex-row pb-0" style="border:none;">
                        <img src="/storage{{ $post->user->profile->image() }}" class="rounded-circle" width="35" height="35">
                        <div class="p-2">At {{ $post->created_at->format('d-m-Y H:i:s') }}, user <strong><a href="/profile/{{ $post->user->username }}">{{ $post->user->username }}</a></strong> posted the following tweet:</div>
                    </div>
                    <div class="card-body d-flex flex-row pt-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pb-2"><img src="/storage/{{ $post->image }}" alt="" class="rounded mx-auto d-block"></div>
                            </div>
                            <div class="col-md-12">
                                {{ $post->body }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="row justify-content-center pt-4">
            <div class="col-lg-7">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
