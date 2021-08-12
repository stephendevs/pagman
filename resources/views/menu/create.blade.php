@extends(config('lpage.master_layout', 'lpage::core.layouts.master'))

@section('pageheading', 'Page Manager | Create Navogation Menu')
    
@section('content')
<section class="dev">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('lpageNavbarMenus') }}">Navigation menus</a> |
                <a href="{{ route('lpageNavbarMenuCreate') }}">Create Menu</a> |
                <a href="{{ route('lpageNavbarMenu', ['id' => 1]) }}">Show Menu</a> |
                <a href="{{ route('lpageNavbarMenuEdit', ['id' => 1]) }}">Edit Menu</a> |
                <a href="{{ route('lpageNavbarMenuDestroy', ['id' => 1]) }}">Delete</a> |
            </div>
        </div>
    </div>
</section>
@endsection