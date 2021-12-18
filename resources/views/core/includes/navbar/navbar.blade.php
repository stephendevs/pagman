<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">

        <div class="navbar-brand-wrapper navbar-brand-container" id="navbarBrandWrapper">
            <a href="" class="navbar-brand">
                Pagman
            </a>
            <a href="" class="navbar-brand navbar-brand-image d-none" id="navbarBrandImage">
              <img src="{{ asset('storage/lpage/favicon.png') }}" alt="Pacoss Logo" class="img-fluid" />
            </a>
        </div>

        <!-- Navbar toggler button-->
        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-left">
            Menu<i class="fa fa-bars ml-1"></i>
        </button>

        <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav navbar-nav-default ml-auto" id="navbarNavDefault">
              <!-- Link Home -->
              <li class="nav-item"><a href="{{ route('pagmanPages') }}" class="nav-link">{{ __('Pages') }}</a></li>

            </div>
        </div>

    </div>
</nav>