<!-- -->
<li class="nav-item sidebar-nav-item d-none">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pageManagerMenu" aria-expanded="true" aria-controls="pageManagerMenu">
      <i class="fa fa-television sidebar-icon"></i>
      <span>Appearance</span>
    </a>
    <div id="pageManagerMenu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item dev" href="{{ route('pagman.menus', ['menu' => config('web.main_menu', 'main')]) }}">{{ __('Menus') }}</a>
        <a class="collapse-item dev" href="{{ route('pagman.theme.options') }}">{{ __('Theme Options | Settings') }}</a>
        <a class="collapse-item dev" href="{{ route('pagman.theme.customize') }}">{{ __('Customize Theme') }}</a>
      </div>
    </div>
</li>