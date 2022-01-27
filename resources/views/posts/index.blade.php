@extends(config('pagman.layout', 'pagman::core.layouts.master'))

@section('title', 'Posts')
@section('pageHeading', 'Posts')

@section('pageActions')
<div class="dropdown d-inline mr-2">
    <a class="dropdown-toggle" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
                <i class="fa fa-folder"></i> Posts
    </a>
    <div class="dropdown-menu shadow" aria-labelledby="triggerId">
        <a class="dropdown-item" href="{{ route('pagman.posts') }}">All Posts</a>
        @if ($count = count($standard_posts))
            @for ($i = 0; $i < $count; $i++)
                <a class="dropdown-item" style="text-transform: capitalize;" href="{{ route('pagman.posts.posttype', ['posttype' => $standard_posts[$i]]) }}">{{ $standard_posts[$i].' Posts' }}</a>
            @endfor
        @endif
        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header">Custom Posts</h6>
         @if ($count = count($custom_posts))
            @for ($i = 0; $i < $count; $i++)
                <a class="dropdown-item" style="text-transform: capitalize;" href="{{ route('pagman.posts.posttype', ['posttype' => $custom_posts[$i]]) }}">{{ $custom_posts[$i].' Posts' }}</a>
            @endfor
        @endif
    </div>
</div>
<div class="dropdown d-inline mr-5">
    <a class="dropdown-toggle" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
                <i class="fa fa-plus"></i> Create Post
    </a>
    <div class="dropdown-menu shadow" aria-labelledby="triggerId">
        <a class="dropdown-item" href="{{ route('pagman.posts.create') }}">Standard Post</a>
        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header">Custom Posts</h6>
        
        @if ($count = count($custom_posts))
            @for ($i = 0; $i < $count; $i++)
                <a class="dropdown-item" style="text-transform: capitalize;" href="{{ route('pagman.posts.posttype.create', ['posttype' => $custom_posts[$i]]) }}">{{ $custom_posts[$i].' Post' }}</a>
            @endfor
        @endif
    </div>
</div>
@endsection

@section('requiredJs')
<script src="{{ asset('stephendevs/pagman/js/posts.js') }}" defer></script>
@endsection



@section('content')
<section class="mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @include('pagman::core.includes.alerts.deletedresponse')
            </div>
        </div>
        <div class="row">

            <!-- filter search posts select posts -->
            <!-- Posts Table -->
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @include('pagman::core.includes.tables.postsTable', ['posts' => $posts])
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection