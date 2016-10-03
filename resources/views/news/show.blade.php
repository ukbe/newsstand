@extends('layouts.twocol')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">News Detail: {{ $news->title }}
            <a href="/news/{{ $news->id }}/export" class="pull-right">Export as PDF</a>
        </div>
        <div class="panel-body">
            @include('news.subviews.news_detail', ['news' => $news])
        </div>
    </div>
@endsection
