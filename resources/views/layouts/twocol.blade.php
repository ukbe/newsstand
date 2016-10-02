@extends('layouts.app')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            @yield('content')
        </div>
        <div class="col-md-3">
            @include('/subviews.sidebar')
        </div>
    </div>
</div>
@endsection
