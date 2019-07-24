@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h3><strong>Timeline</strong></h3>
                @forelse ($posts as $post)
                    <div class="card mb-3">
                        <div class="card-header d-flex flex-row pb-0" style="border:none;">
                            <div class="p-2">At {{ $post->created_at->format('d-m-Y H:i:s') }}, user <strong><a href="/profile/{{ $post->user->username }}">{{ $post->user->username }}</a></strong> posted the following tweet:</div>
                        </div>

                        <div class="card-body d-flex flex-row pt-0">
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
                @empty
                    <p>No tweet</p>
                @endforelse

            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-7">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
