<table class="table table-stripped table-responsive">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Published</th>
            <th>Summary</th>
            <th>Created At</th>
            <th></th></tr>
    </thead>
    <tbody>
        @if (count($posted_news) > 0)

            @foreach ($posted_news as $news)
                <tr>
                    <th scope="row">{{ $news->id }}</th>
                    <td><strong>{{ $news->title }}</strong></td>
                    <td>{{ $news->publish }}</td>
                    <td>{{ $news->summary }}</td>
                    <td>{{ $news->created_at->format('F d, Y | H:i') }}</td>
                    <td><a href="{{ url('news/' . $news->id . '/remove') }}" class="btn btn-default btn-xs btn-danger">Remove</a></td>
                </tr>
            @endforeach

        @else
            <tr>
                <td colspan="5" class="text-center">
                    <p class="text-muted">You haven't posted any news yet.</p>
                </td>
            </tr>
        @endif

    </tbody>
</table>

