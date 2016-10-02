@extends('layouts.twocol')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Posted News</div>
        <div class="panel-body">
            @include('news.subviews.news_table', ['posted_news' => $posted_news])
        </div>
    </div>
@endsection
