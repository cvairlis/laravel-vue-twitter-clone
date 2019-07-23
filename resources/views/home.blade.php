@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header d-flex flex-row pb-0" style="border:none;">
                    <div class="p-2"><strong>username</strong> - <a href="/profile">link</a> to the profile page - DateTime of tweet</div>
                </div>

                <div class="card-body d-flex flex-row pt-0">
                    <div class="p-2">Tweet text</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
