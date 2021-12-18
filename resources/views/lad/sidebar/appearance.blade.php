<!-- -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pageManagerMenu" aria-expanded="true" aria-controls="pageManagerMenu">
      <i class="fa fa-television"></i>
      <span>Appearance</span>
    </a>
    <div id="pageManagerMenu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('pagman') }}">{{ __('Pagman') }}</a>
        <a class="collapse-item" href="{{ route('pagman.menus', ['menu' => config('web.main_menu', 'main')]) }}">{{ __('Menus') }}</a>
      </div>
    </div>
</li>