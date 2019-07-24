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
                            <button class="btn btn-primary ml-4">Follow</button>
                        </div>
                        <div>Email: <strong>{{ $user->email }}</strong></div>
                        <div class="row h-100 justify-content-center align-items-center">
                            <div class="p-2">Total tweets: <strong> 100 </strong></div>
                            <div class="p-2">Total followers: <strong> 12 </strong></div>
                            <div class="p-2">Total following: <strong> 168 </strong></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center pt-4">
            <div class="col-md-7">
                <div class="card p-2">
                    <div class="card-header">
                        <div><strong>List of Tweets</strong></div>
                    </div>
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
