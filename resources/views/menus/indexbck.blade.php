@extends(config('pagman.layout', 'pagman::core.layouts.master'))

@section('requiredCss')
<link href="{{ asset('stephendevs/pagman/css/app.css') }}" rel="stylesheet">
@endsection


@section('requiredJs')
    <script src="{{ asset('stephendevs/pagman/js/menu/menu.js') }}" defer></script>
@endsection

@section('pageHeading')
    {{ 'Menu |' }}
@endSection

    
@section('pageActions')
<form action="" class="d-inline">
  <select name="" id="" class="btn btn-sm">
    <option value=""><i class="fa fa-fw fa-home"></i>Select Menu</option>
  </select>
</form>
<a href="{{ route('pagmanPages') }}" class="btn btn-sm"><i class="fa fa-fw fa-folder"></i>Build Menu Items</a>
@endsection
    
@section('content')
<section class="mt-4">
  <div class="container-fluid">
    <div class="row">

      <div class="col-lg-3">
        <div class="card">
          <div class="card-header">
            <h6 class="mb-0">Add Menu Items</h6>
          </div>
          <div class="card-body p-1">
            <div class="list-group list-flush">
              <a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#addPagesToMenuModal">Pages <i class="fa fa-plus"></i></a>
              <a href="#" class="list-group-item list-group-item-action">Item</a>
              <a href="#" class="list-group-item list-group-item-action disabled">Disabled item</a>
            </div>

            <ul class="">
              <li>posts</li>
              <li>social links</li>
              <li>pages</li>
              <li>custom urls</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card">

          <div class="card-header">
            hh
          </div>

          <div class="card-body">
            <div class="row menu-items" id="menuItems">
              @if(count($menu->menuItems))
                  @foreach ($menu->menuItems as $menuItem)
                    @if (count($menuItem->children))
                        <div class="menu-item col-lg-7 mb-1">
                          {{ $menuItem->name }}
                        </div>
                        <div class="col-lg-2 mb-1 order">
                          @include('pagman::core.includes.forms.reorderMenuItemForm', ['itemOrder' => $menuItem->item_order])
                        </div>
                        @foreach ($menuItem->children as $child)
                            <div class="menu-item col-lg-7 offset-lg-1 mb-1">
                              {{ $child->name }}
                            </div>
                            <div class="col-lg-2 order">
                              @include('pagman::core.includes.forms.reorderMenuItemForm', ['itemOrder' => $child->item_order])
                            </div>
                        @endforeach
                    @else
                        <div class="menu-item col-lg-7 mb-1">
                          {{ $menuItem->name }}
                        </div>
                        <div class="col-lg-2 order">
                          @include('pagman::core.includes.forms.reorderMenuItemForm', ['itemOrder' => $menuItem->item_order])
                        </div>
                    @endif
                  @endforeach
              @else
                  
              @endif

            </div>
            
          </div>
         
        </div>
      </div>

    </div>
  </div>
</section>
@include('pagman::core.includes.modals.addPagesToMenuModal')
@endsection


