@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <h3><strong>Timeline</strong></h3>
            @forelse ($user->timeline() as $post)
                <div class="card mb-3">
                    <div class="card-header d-flex flex-row pb-0" style="border:none;">
                        <div class="p-2"><strong></strong> - <a href="/profile">link</a> to the profile page - DateTime of tweet</div>
                    </div>

                    <div class="card-body d-flex flex-row pt-0">
                        <div class="p-2">{{ $post->body }}</div>
                    </div>
                </div>
            @empty
                <p>No tweet</p>
            @endforelse

        </div>
    </div>
</div>
@endsection
