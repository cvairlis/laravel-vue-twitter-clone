@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <h3><strong>Users list</strong></h3>
                @forelse ($users as $user)
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="row align-items-center h-100">
                                <div class="col-md-6 mx-auto">
                                    User: <strong><a href="/profile/{{ $user->username }}">{{ $user->username }}</a></strong>
                                </div>
                                <div class="col-md-6 text-right">
                                    @if (Auth::id() != $user->id)
                                        <follow-button user-id="{{ $user->id }}" follows="{{ (auth()->user()) ? auth()->user()->following->contains($user->id) : false }}"></follow-button>
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
                @empty
                    <p>No users</p>
                @endforelse
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
