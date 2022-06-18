@extends(config('pagman.layout', 'pagman::core.layouts.master'))

@section('requiredJs')
    <script src="{{ asset('stephendevs/pagman/js/app.js') }}" defer></script>
@endsection

@section('pageHeading', 'Dashboard')

@section('pageActions')

@endsection
    
@section('content')
<section class="mt-4">
    <div class="container-fluid">
        <div class="row">
            
             <!-- Pages Count -->
             <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pages</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pages_count }}</div>
                      </div>
                      <div class="col-auto">
                        <a href="{{route('pagman.pages')}}"><i class="fa fa-file fa-2x text-gray-300"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

               <!-- Posts Count -->
             <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Posts</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $posts_count }}</div>
                      </div>
                      <div class="col-auto">
                        <a href="{{route('pagman.posts')}}"><i class="fa fa-file fa-2x text-gray-300"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

        </div>
    </div>
</section>
@endsection