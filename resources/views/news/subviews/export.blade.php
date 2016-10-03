<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

</head>
<body>
<div class="container" style="max-width: 100%;">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="center">
                    <img src="{{ $news->imageUrl() }}" alt="{{ $news->title }}" class="img-responsive" style="width: 100%;">
                </div>
                <div class="caption">
                    <h1>{{ $news->title }}</h1>
                    <p>{{ $news->user->name }}</p>
                    <p><small class="text-muted">{{ $news->created_at->format('F d, Y | H:i') }}</small></p>
                    <p>{{ $news->content }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
