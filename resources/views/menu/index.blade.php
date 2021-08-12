@extends(config('lpage.master_layout', 'lpage::core.layouts.master'))

@section('pageHeading', 'Nav Menus')

@section('requiredJs')
    <script src="{{ asset('lpage/js/menu/menu.js') }}" defer></script>
@endsection

@section('pageActions')
    <a href="{{ route('lpageManager') }}" class="btn btn-sm"><i class="fa fa-fw fa-home"></i>Page Manger</a>
    <a href="{{ route('lpagePages') }}" class="btn btn-sm"><i class="fa fa-fw fa-folder"></i>Pages</a>
@endsection
    
@section('content')
    <section class="page-section mt-4">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-4">
                    <div class="row memus-holder" id="menusHolder" data-ajax="{{ route('lpageMenusAjax') }}">
                        @if (count($menus))
                            @foreach ($menus as $menu)
                                <div class="col-lg-12 menu mb-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-7">
                                                    <a href="{{ route('lpageMenuShow', ['id' => $menu->id]) }}" class="d-inline"><h6 class="mb-0">{{ $menu->name }}</h6></a>
                                                    <small class="{{ ($menu->is_primary) ? __('mr-4') : __('') }}">{{ ($menu->is_primary) ? __('Primary Menu') : __('') }}</small>
                                                    <small>{{ ($menu->footer) ? __('Footer Menu') : __('') }}</small>
                                                </div>
                                                <div class="col-lg-5">
                                                    <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="{{ '#deleteMenuModal'.$menu->id }}"><i class="fa fa-trash"></i></a>
                                                    @includeIf('lpage::core.includes.modals.deleteMenuModal', ['some' => 'data'])
                                                    <a href="{{ route('lpageMenuEdit', ['id' => $menu->id]) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-lg-12">
                                <p>You do not have menus available</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h6 class="mb-0">Create Menu</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            @includeIf('lpage::core.includes.forms.createMenuForm', ['some' => 'data'])
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection