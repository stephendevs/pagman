<li class="nav-item sidebar-nav-item ">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#posts" aria-expanded="true" aria-controls="posts">
    <i class="fa fa-television sidebar-icon"></i>
    <span>Posts</span>
  </a>
  <div id="posts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item dev" href="{{ route('pagman.posts') }}">{{ __('All Posts') }}</a>
      <a class="collapse-item dev" href="{{ route('pagman.posts.create') }}">{{ __('Add New') }}</a>
      <a class="collapse-item dev" href="{{ route('pagman.categories') }}">{{ __('Categories') }}</a>
    </div>
  </div>
</li>