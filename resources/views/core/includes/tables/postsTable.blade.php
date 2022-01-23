@if (count($posts))
<div class="table-responsive">
    <table class="table table-borderless">
        <thead>
            <th></th>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Published</th>
            <th></th>
        </thead>
        <tbody>
           @foreach ($posts as $post)
            <tr>
                <td>
                    <input type="checkbox">
                </td>
                <td>{{ $post->post_title }}</td>
                <td>{{ ($post->author != null) ? $post->author['username'] : 'System' }}</td>
                <td>{{ $post->post_type }}</td>
                <td>{{ $post->created_at }}</td>
                <td>
                    <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    <a href="{{ route('pagman.posts.edit', ['id' => $post->id]) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
           @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</div>
<div>
    {{ $posts->links() }}
</div>
@else
<div>
    no posts
</div>
@endif