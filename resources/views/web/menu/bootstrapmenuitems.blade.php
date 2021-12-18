
@if (count($menu->menuItems))
<ul class="navbar-nav mr-auto" id="navbarNavDefault">

    @foreach ($menu->menuItems as $menuItem)
        @if (count($menuItem->children))
            <li class="nav-item dropdown">
                <a id="pages" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{ $menuItem->name }}</a>
               
                <div class="dropdown-menu">
                    @foreach ($menuItem->children as $child)
                    <div class="menu-item col-lg-7 offset-lg-1 mb-1">
                      <a href="{{ $child->url }}" class="dropdown-item">{{ $child->name }}</a>
                    </div>
                    @endforeach
                </div>
                
            </li>
        @else
            <li class="nav-item"><a href="{{ $menuItem->url }}" class="nav-link">{{ $menuItem->name }}</a></li>
        @endif
    @endforeach
    
</ul>
@else
    
@endif