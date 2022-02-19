@if (count($pages))
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
           @foreach ($pages as $page)
            <tr>
                <td>
                    <input type="checkbox">
                </td>
                <td>{{ $page->post_title }}</td>
                <td>{{ ($page->author != null) ? $page->author['name'] : 'System' }}</td>
                <td>{{ $page->post_type }}</td>
                <td>{{ $page->created_at }}</td>
                <td>{{ $page->updated_at }}</td>
                <td>{{ ($page->author != null) ? $page->updatedby['name'] : 'System' }}</td>

                <td>
                    <a href="{{ route('pagman.posts.destroy', ['id' => $page->id]) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    <a href="{{ route('pagman.pages.edit', ['id' => $page->id]) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
           @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</div>
{{ (count($pages) > 1) ? $pages->links() : '' }}
<div>
</div>
@else
<div>
    no posts
</div>
@endif