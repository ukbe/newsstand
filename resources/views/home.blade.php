@extends('layouts.twocol')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Featured News</div>
        <div class="panel-body">
            <div class="row row-eq-height">
                @each('news.subviews.news', $featured_news, 'news', 'news.subviews.nonews')
            </div>
        </div>
    </div>
@endsection
