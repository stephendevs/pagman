@extends(config('lpage.master_layout', 'lpage::core.layouts.master'))

@section('pageHeading', 'Page: '.$page->name)

@section('pageActions')
    <a href="{{ route('lpageManager') }}" class="btn btn-sm"><i class="fa fa-fw fa-home"></i>Page Manger</a>
    <a href="{{ route('lpagePages') }}" class="btn btn-sm"><i class="fa fa-fw fa-folder"></i>Pages</a>
    <a href="{{ route('lpagePageCreate') }}"  class="btn btn-sm"><i class="fa fa-fw fa-plus"></i>Create Page</a>
@endsection

@section('requiredJs')
    <script src="{{ asset('lpage/js/page/page.js') }}" defer></script>
@endsection

@section('content')

    <section class="page-section mt-4">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-lg-4">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title">{{ $page->name.' Page' }}</h6>
                                </div>
                                <div class="card-body">
                                    <p>Title: {{ $page->title }}</p>
                                    <p>Slug: {{ $page->slug }}</p>
                                    <p><b>Last Modified On:</b> {{ $page->updated_at }}</p>
                                    <p>
                                        <b>Published:</b>
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('lpagePageEdit', ['id' => $page->id]) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="{{ '#deletePageModal'.$page->id }}"><i class="fa fa-trash"></i></a>
                                    @includeIf('lpage::core.includes.modals.deletePageModal', ['some' => 'data'])
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    @if (count($page->menus))
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title">
                                    {{ __('Page Menus') }}
                                </h6>
                            </div>
                            <div class="card-body">
                                @foreach ($page->menus as $menu)
                                    <div>
                                        <p>{{ $menu->name }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">{{ __('Children') }}</h6>
                        </div>
                        <div class="card-body">
                            @if (count($children))
                                @foreach ($children as $child)
                                    <div>
                                        <p>{{ $child->name }}</p>
                                    </div>
                                @endforeach
                            @else
                                <p>
                                    {{ __('Page has no children') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection