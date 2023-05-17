@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="col-md-8 mx-auto p-3">
                    <img src="images/school-logo.png" width="100%" class="mb-2">
                </div>
                <div class="mx-auto pb-4">
                    @guest
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-success">Register</a>
                    @endguest
                    @auth
                    <a href="{{ route('home') }}" class="btn btn-success">Bulletins</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
