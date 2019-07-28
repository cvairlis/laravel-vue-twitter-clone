@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <h3><strong>User profile</strong></h3>
                    @component('components.profiles.index',  ['user' => $user])@endcomponent
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
