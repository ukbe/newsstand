@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h1>Featured News</h1>

                    <ul class="media-list">
                    @foreach($featured_news as $news)
                        <li class="media">
                            <a href="#" class="pull-left">
                                <img src="{{ $news->image }}" alt="" class="img-circle">
                            </a>
                            <div class="media-body">
                                        <span class="text-muted pull-right">
                                            <small class="text-muted">{{ date('F d, Y | H:i:s', strtotime($news->created_at)) }}</small>
                                        </span>
                                <strong class="text-success">{{ $news->title }}</strong>
                                <strong class="text-success">{{ $news->user->name }}</strong>
                                <p>
                                    {{ $news->summary }}
                                </p>
                            </div>
                        </li>

                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
