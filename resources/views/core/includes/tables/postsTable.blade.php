@if (count($posts))
<div class="table-responsive">
    <table class="table table-borderless">
        <thead>
            <th>
                <input type="checkbox">
            </th>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Created On</th>
            <th>Last Modified On</th>
            <th>Last Modified By</th>
            <th></th>
        </thead>
        <tbody>
           @foreach ($posts as $post)
            <tr>
                <td>
                    <input type="checkbox">
                </td>
                <td>{{ $post->post_title }}</td>
                <td>{{ ($post->author != null) ? $post->author['name'] : 'System' }}</td>
                <td>{{ $post->post_type }}</td>
                <td>{{ $post->created_at->toFormattedDateString() }}</td>
                <td>{{ $post->updated_at->toFormattedDateString() }}</td>
                <td>{{ ($post->author != null) ? $post->updatedby['name'] : 'System' }}</td>

                <td>
                    <a href="{{ route('pagman.posts.destroy', ['id' => $post->id]) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    @if (count($standard_posts))
                    <a href="{{ (in_array($post->post_type, $standard_posts)) ? route('pagman.posts.edit', ['id' => $post->id]) : route('pagman.posts.posttype.edit', ['id' => $post->id, 'posttype' => $post->post_type]) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    @else
                    <a href="{{ route('pagman.posts.posttype.edit', ['id' => $post->id, 'posttype' => $post->post_type]) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    @endif
                </td>
            </tr>
           @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</div>
{{ (count($posts) > 1) ? $posts->links() : '' }}
<div>
</div>
@else
<div>
    no posts
</div>
@endif