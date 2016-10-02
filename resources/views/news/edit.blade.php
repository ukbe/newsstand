@extends('layouts.twocol')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Post News</div>
        <div class="panel-body">

            @if (count($errors))
                <ul>
                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach
                </ul>
            @endif

            <form method="POST" action="/news{{ isset($news) ? "/" . $news->id : '' }}" enctype="multipart/form-data">

                {{ isset($news) ? method_field('PATCH') : '' }}

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Author</label>
                    <p class="text-warning">
                        <label>{{ Auth::user()->name  }}</label>
                    </p>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title', isset($news) ? $news->title : '') }}">
                </div>
                <div class="form-group">
                    <label for="summary">Summary</label>
                    <input type="text" class="form-control" id="summary" name="summary" placeholder="Summary" value="{{ old('summary', isset($news) ? $news->summary : '') }}">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" class="form-control">{{ old('content', isset($news) ? $news->content : '') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    @if (isset($news) && !empty($news->image))
                        <img src="{{ $news->imageUrl() }}" alt="{{ $news->title }}" class="img-rounded thumbnail img-responsive">
                    @endif
                    <input type="file" id="image" name="image">
                    <p class="help-block">Allowed formats are jpeg, gif, png. Maximum file size 2MB.</p>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="publish" name="publish" value="1" {{ old('publish') ? ' checked' : '' }}> Publish
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Post</button>

            </form>
        </div>
    </div>

@endsection