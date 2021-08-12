@extends(config('lpage.master_layout', 'lpage::core.layouts.master'))

@section('pageHeading')
    {{ 'Menu | '.$menu->name }}
@endSection

@section('pageActions')
    <a href="{{ route('lpageManager') }}" class="btn btn-sm"><i class="fa fa-fw fa-home"></i>Page Manger</a>

    <a href="{{ route('lpageMenus') }}" class="btn btn-sm"><i class="fa fa-fw fa-list"></i>Menus</a>
    <a href="{{ route('lpageMenuCreate') }}" class="btn btn-sm" data-toggle="modal" data-target="#createMenuModal"><i class="fa fa-fw fa-list"></i><i class="fa fa-plus-square-o"></i> Create Menu</a>
    <a href="{{ route('lpagePages') }}" class="btn btn-sm"><i class="fa fa-fw fa-folder"></i>Pages</a>
@endsection
    
@section('content')
    <section class="page-section mt-4">
        <div class="container-fluid">
          <div class="row">

            <div class="col-lg-4">
              <div class="row">

                <div class="col-lg-12 mb-2">
                  <div class="card">
                    <div class="card-body">
                      <h6 class="mb-1">Menu Details</h6>
                    </div>
                  </div>
                </div>

                <div class="col-lg-12 mb-2">
                  <div class="card">
                    <div class="card-body">
                      <div class="alert alert-success {{ (Session('success')) ? __('d-block') : __('d-none') }}">
                        {{ Session('success') }}
                      </div>
                      <div class="p-1 collapse" id="editMenuCollapse">
                        @includeIf('lpage::core.includes.forms.editMenuForm', ['some' => 'data'])
                        <hr />
                      </div>
                      <small><b>Name:</b> </small><small>{{ $menu->name }}</small><hr />
                      <small><b>Primary:</b> </small><small>{{ ($menu->is_primary) ? __('Is Primary Menu') : __('Not Primary Menu') }}</small><hr />
                      <small><b>Footer:</b> </small><small>{{ ($menu->footer) ? __('Is Footer Menu') : __('Not Footer Menu') }}</small><hr />
                      <a href="#" class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#editMenuCollapse"><i class="fa fa-fw fa-edit"></i></a>
                      <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteMenuModal"><i class="fa fa-fw fa-trash"></i></a>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col-lg-6">
              <div class="row">

                <div class="col-lg-12 mb-2">
                  <div class="card">
                    <div class="card-body">
                      <h6 class="mb-1">Menu Items [Pages]</h6>
                    </div>
                  </div>
                </div>


                @if (count($menu->pages))
                    @foreach ($menu->pages as $page)
                      <div class="col-lg-4 mb-1">
                        <div class="card">
                          <div class="card-body p-2">
                            {{ $page->name }}
                          </div>
                        </div>
                      </div>
                    @endforeach
                @endif

              </div>
            </div>

          </div>
        </div>
    </section>

    @includeIf('lpage::core.includes.modals.createMenuModal', ['some' => 'data'])

@endsection