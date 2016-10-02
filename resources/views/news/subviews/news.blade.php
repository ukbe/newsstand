<div class="col-md-6">
    <div class="thumbnail">
        <a href="{{ $news->path() }}" class="pull-left">
            <img src="{{ $news->image }}" alt="{{ $news->title }}" class="img-rounded thumbnail"></a>
        <div class="caption">
            <h3>{{ $news->title }}</h3>
            <p>{{ $news->user->name }}
                <span class="text-muted pull-right">
                    <small class="text-muted">{{ $news->created_at->format('F d, Y | H:i') }}</small>
                </span></p>
            <p>{{ $news->summary }}</p>
            <p>
                </p>
        </div>
    </div>
</div>
