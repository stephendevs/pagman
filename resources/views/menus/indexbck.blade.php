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



<div class="row">
            
  <div class="col-lg-3">

      <div class="card shadow-sm">
        <div class="card-header">
          <h6>Available Menu Items</h6>
        </div>
              
        <div class="card-body p-1">
          <div class="list-group list-flush">
            <a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#addPagesToMenuModal">Pages <i class="fa fa-plus"></i></a>
            <a href="#" class="list-group-item list-group-item-action">Item</a>

            <!-- custom Url menu item -->
            <a href="#customUrl" class="list-group-item list-group-item-action" data-toggle="collapse" aria-expanded="false" aria-controls="customUrl">Custom URL</a>
                      
            <div class="collapse" id="customUrl">
              <form action="{{ route('pagman.menuitem.create', ['id' => $menu->id]) }}" method="POST">
                @csrf
                <input type="text" name="name" class="form-control w-75 m-2" placeholder="Custom URL Name" />
                <small class="text-danger">{{ $errors->first('name') }}</small>
                <input type="url" name="url" class="form-control w-75 m-2" placeholder="https://pagman.com/hello-world" />
                <small class="text-danger">{{ $errors->first('url') }}</small><hr >
                <input type="submit" class="btn btn-sm ml-3 btn-primary" value="Add URL" />
              </form>
            </div>

          </div>

        </div>
      </div>
  </div>

  <div class="col-lg-6">
      <div class="card shadow-sm">

        <div class="card-header">
          <h6>Menu Items</h6>
        </div>

        <div class="card-body">
          <div class="menu-items" id="menuItems">
            @if(count($menu->menuItems))
                @foreach ($menu->menuItems as $menuItem)
                  @if (count($menuItem->children))
                      <div class="menu-item">
                          <a class="" data-toggle="collapse" href="{{ '#item'.$menuItem->id }}" aria-expanded="false" aria-controls="contentId">
                            {{ $menuItem->name }}
                          </a>
                          <small>[{{ 'menu item' }}]</small>
                        <div class="collapse mt-2" id="{{ 'item'.$menuItem->id }}">
                          <small><a href="{{ route('pagman.menuitem.destroy', ['id' => $menuItem->id]) }}" class="text-danger"><i class="fa fa-trash"></i> Delete Item</a></small>
                        </div>
                      </div>
                      @foreach ($menuItem->children as $child)
                        <div class="menu-item ml-3">
                          <a class="" data-toggle="collapse" href="{{ '#item'.$child->id }}" aria-expanded="false" aria-controls="contentId">
                            {{ $child->name }}
                          </a>
                          <small>[{{ 'menu item' }}]</small>
                        <div class="collapse mt-2" id="{{ 'item'.$child->id }}">
                          <small><a href="{{ route('pagman.menuitem.destroy', ['id' => $child->id]) }}" class="text-danger"><i class="fa fa-trash"></i> Delete Item</a></small>
                        </div>
                      </div>
                      @endforeach
                  @else
                    <div class="menu-item">
                      <a class="" data-toggle="collapse" href="{{ '#item'.$menuItem->id }}" aria-expanded="false" aria-controls="contentId">
                        {{ $menuItem->name }}
                      </a>
                      <small>[{{ 'menu item' }}]</small>
                      <div class="collapse mt-2" id="{{ 'item'.$menuItem->id }}">
                        <small class="mr-3"><a href="{{ $menuItem->url }}" target="blank" class="text-primary"><i class="fa fa-eye"></i> View</a></small>
                        <small class="mr-3"><a href="{{ route('pagman.menuitem.destroy', ['id' => $menuItem->id]) }}" class="text-danger"><i class="fa fa-trash"></i> Delete Item</a></small>
                      </div>
                  </div>
                             
                  @endif
                @endforeach
            @else
            <div class="hello">
              no menu items --- please add some menu items to {{ $menu->name }}
            </div>
            @endif

          </div>
          
        </div>
       
      </div>
  </div>

  <div class="col-lg-3">
    <div class="card shadow-sm">
      <div class="card-header">
        <h6>Details</h6>
      </div>
      <div class="card-body">

      </div>
    </div>
  </div>

</div>



<!-- Modal -->
<div class="modal fade" id="createMenuModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Create New Menu</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
          </div>
          <div class="modal-body">
              @includeIf('pagman::core.includes.forms.createMenuForm', ['some' => 'data'])
          </div>
      </div>
  </div>
</div>


