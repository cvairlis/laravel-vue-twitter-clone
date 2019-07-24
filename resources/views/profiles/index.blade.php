@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card p-2">
                    <div class="card-header">
                        <div><strong>User profile</strong></div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex pb-3">
                            <h3 class="pt-2">Username: <strong>{{ $user->username }}</strong></h3>
                            @if (Auth::id() != $user->id)
                                <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                            @endif
                        </div>
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
