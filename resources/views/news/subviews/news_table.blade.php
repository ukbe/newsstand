<table class="table table-stripped">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Published</th>
            <th>Summary</th>
            <th>Created At</th></tr>
    </thead>
    <tbody>
        @if (count($posted_news) > 0)

            @foreach ($posted_news as $news)
                <tr>
                    <th scope="row">{{ $news->id }}</th>
                    <td><a href="/news/{{ $news->id }}/edit">{{ $news->title }}</a></td>
                    <td>{{ $news->publish }}</td>
                    <td>{{ $news->summary }}</td>
                    <td>{{ $news->created_at->format('F d, Y | H:i') }}</td>
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

