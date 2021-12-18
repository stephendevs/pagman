@if (count($posts))
<div class="table-responsive">
    <table class="table table-borderless">
        <thead>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Published</th>
        </thead>
        <tbody>
           @foreach ($posts as $post)
            <tr>
                <td>{{ $post->post_name }}</td>
                <td>{{ ($post->author != null) ? $post->author['username'] : 'Stephen Okello Omoding' }}</td>
                <td>{{ $post->post_type }}</td>
            </tr>
           @endforeach
        </tbody>
    </table>
</div>
@else
<div>
    no posts
</div>
@endif