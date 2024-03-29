@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <h3><strong>Users list</strong></h3>
                @forelse ($users as $user)
                    @component('components.profiles.index', [
                        'user' => $user,
                        'follows' => (auth()->user()) ? auth()->user()->following->contains($user->id) : false,
                    ])@endcomponent
                @empty
                    <p>No users</p>
                @endforelse


                <div class="row justify-content-center pt-2">
                    <div class="col-lg-7">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
