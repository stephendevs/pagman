<div class="pages-table-wrapper">
    <div class="table-responsive">
        <table class="table table-borderless table-hover">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Status</th>
                    <th scope="col">Last Modified</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                <tr class="page-row">
                    <td>
                        <div>
                            <span><a href="{{ route('lpagePageShow', ['id' => $page->id]) }}">{{ $page->name }}</a></span><br />
                            <ul class="actions mt-1 p-0 collapse">
                                <li class="d-inline">Edit</li> |
                                <li class="d-inline"><a href="#" data-toggle="modal" data-target="{{ '#quickEditPageModal'.$page->id }}">Quick Edit</a></li> |
                                <li class="d-inline">Trash</li> |
                                <li class="d-inline">Preview</li>
                            </ul>
                        </div>
                    </td>
                    <td>{{ $page->title }}</td>
                    <td>{{ $page->slug }}</td>
                    <td>{{ ($page->published) ? __('Published') : __('Not Published') }}</td>
                    <td>{{ $page->created_at }}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="{{ '#deletePageModal'.$page->id }}"><i class="fa fa-fw fa-trash"></i></a>
                        @includeIf('lpage::core.includes.modals.deletePageModal', ['some' => 'data'])
                        <a href="{{ route('lpagePageEdit', ['id' => $page->id]) }}" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-edit"></i></a>
                    </td>
                    @includeIf('lpage::core.includes.modals.quickEditPageModal', ['some' => 'data'])
                </tr>
                @endforeach
                           
            </tbody>
        </table>
    </div>
</div>