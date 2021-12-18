@extends(config('pagman.layout', 'pagman::core.layouts.master'))

@section('requiredJs')
    <script src="{{ asset('stephendevs/pagman/js/app.js') }}" defer></script>
@endsection

@section('pageHeading', 'Pagman')

@section('pageActions')
<a href="{{ route('pagman.syn.menuitems') }}" class="btn btn-sm"><i class="fa fa-fw fa-refresh"></i>Syn Menu Items</a>
<a href="{{ route('pagmanPages') }}" class="btn btn-sm"><i class="fa fa-fw fa-refresh"></i>Syn Pages</a>

<a href="{{ route('pagmanPages') }}" class="btn btn-sm"><i class="fa fa-fw fa-folder"></i>Pages</a>
@endsection
    
@section('content')
<section class="mt-4">
    <div class="container-fluid">
        <div class="row">

            <!-- Pages Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow-sm h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary  mb-1">Nav Menus</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                      </div>
                      <div class="col-auto">
                        <i class="fa fa-bars fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

            <!-- Pages Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow-sm h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary  mb-1">Pages</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">16</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection