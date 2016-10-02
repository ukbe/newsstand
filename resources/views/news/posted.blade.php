@extends('layouts.twocol')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Posted News</div>
        <div class="panel-body">
            @include('subviews.news_table', ['news' => $news])
        </div>
    </div>
@endsection
