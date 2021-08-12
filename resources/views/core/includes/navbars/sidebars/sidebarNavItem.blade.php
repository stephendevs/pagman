<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pageManagerMenu" aria-expanded="true" aria-controls="pageManagerMenu">
    <i class="fa fa-fw fa-pagelines"></i>
    <span>Page Manager</span>
  </a>
  <div id="pageManagerMenu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Manage Pages:</h6>
      <a class="collapse-item" href="{{ route('lpageManager') }}">{{ __('Page Manager') }}</a>
      <a class="collapse-item" href="{{ route('lpageMenus') }}">{{ __('Menus') }}</a>
      <a class="collapse-item" href="{{ route('lpagePages') }}">{{ __('Pages') }}</a>
    </div>
  </div>
</li>