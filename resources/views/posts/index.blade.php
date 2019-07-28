@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <h3><strong>Timeline</strong></h3>
                @component('components.posts.index',  ['posts' => $posts])@endcomponent
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-7">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
