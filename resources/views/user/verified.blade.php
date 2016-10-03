@extends('layouts.twocol')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Email Verification</div>
        <div class="panel-body">
            <p>You have successfully verified your email address.</p>
            <p>Please login with your credentials.</p>
            <a href="/login">Login</a>
        </div>
    </div>
@endsection
