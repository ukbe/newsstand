<div>
        <div class="center">
            <img src="{{ $news->imageUrl() }}" alt="{{ $news->title }}" class="img-responsive">
        </div>
        <div class="caption">
            <h1>{{ $news->title }}</h1>
            <p>{{ $news->user->name }}
                <span class="text-muted pull-right">
                    <small class="text-muted">{{ $news->created_at->format('F d, Y | H:i') }}</small>
                </span></p>
            <p>{{ $news->content }}</p>
            <p>
                </p>
        </div>
</div>
