@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center pt-4">
            <div class="col-md-7">
                <h3><strong>User profile</strong></h3>
                <div class="card p-2">
                    <div class="card-header">
                        <div class="row align-items-center h-100">
                            <div class="col-md-6 mx-auto">
                                User: <strong>{{ $user->username }}</strong>
                            </div>
                            <div class="col-md-6 text-right">
                                @if (Auth::id() != $user->id)
                                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                                @else
                                    <button class="btn btn-primary ml-4">Edit profile</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>Email: <strong>{{ $user->email }}</strong></div>
                        <div class="row h-100 justify-content-center align-items-center">
                            <div class="p-2">Total tweets: <strong> {{ $user->posts->count() }}</strong></div>
                            <div class="p-2">Total followers: <strong> {{ $user->profile->followers->count() }} </strong></div>
                            <div class="p-2">Total following: <strong> {{ $user->following->count() }} </strong></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center pt-4">
            <div class="col-md-7">
                <h3><strong>List of Tweets</strong></h3>
            </div>
        </div>

        @foreach ($posts as $post)
        <div class="row justify-content-center pt-4">
            <div class="col-md-7">
                <div class="card p-2">
                    <div class="card-header">
                        <div>At {{ $post->created_at->format('d-m-Y H:i:s') }} user <strong>{{ $user->username }}</strong> tweeted the following: </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pb-2"><img src="/storage/{{ $post->image }}" alt=""></div>
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
            <div class="col-md-7">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
