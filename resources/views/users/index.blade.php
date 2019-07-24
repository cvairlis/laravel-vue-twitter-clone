@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h3><strong>Users list</strong></h3>
                @forelse ($users as $user)
                    <div class="card mb-3">
                        <div class="card-header d-flex flex-row pb-0" style="border:none;">
                            <div class="p-2"><strong><a href="/profile/{{ $user->username }}">{{ $user->username }}</a></strong></div>
                            <follow-button user-id="{{ $user->id }}" follows="{{ (auth()->user()) ? auth()->user()->following->contains($user->id) : false }}"></follow-button>
                        </div>
                        <div class="card-body">
                            <div class="pl-4">Total followers: {{ $user->profile->followers->count() }}</div>
                            <div class="pl-4">Total following: {{ $user->following->count() }}</div>
                            <div class="pl-4">Total following: {{ $user->posts->count() }}</div>
                        </div>
                    </div>
                @empty
                    <p>No users</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
