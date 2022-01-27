@extends(config('pagman.layout', 'pagman::core.layouts.master'))

@section('title', 'Menus')
@section('pageHeading', 'Menus')

@section('requiredCss')
<link href="{{ asset('pagman/css/pagman.css') }}" rel="stylesheet">
@endsection


@section('requiredJs')
    <script src="{{ asset('pagman/js/pagman.js') }}" defer></script>
@endsection

@section('pageActions')
@endsection
    
@section('content')
<section class="mt-4">
    <div class="container-fluid">
       <div class="row">

        <!-- Column 1 -->
        <div class="col-lg-2">
          <div class="card">
            <div class="card-body">hello</div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              @if (count($menus))
                  <div class="table-responsive">
                    <table class="table table-striped table-inverse ">
                      <thead class="thead-inverse">
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Items</th>
                          <th></th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($menus as $menu)
                          <tr>
                            <td scope="row">{{ $menu->id }}</td>
                            <td><a href="{{ route('pagman.menus.show', ['id' => $menu->id]) }}">{{ $menu->name }}</a></td>
                            <td>{{ $menu->menu_items_count }}</td>
                            <td>
                              <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                              <a href="" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                  </div>
              @else
                  
              @endif
            </div>
          </div>
        </div>

       </div>
    </div>
</section>
@endsection
