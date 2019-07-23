@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Profile</div>
                    <div class="card-body">
                        @if (Auth::check())
                            <div class="alert alert-success" role="alert">
                                You are logged in!
                            </div>

                        @else
                            You have to <a href="{{ route('login') }}">login</a> in order to continue.
                        @endauth

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
