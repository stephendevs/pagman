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
        @php
        $standard_posts = standard_post_types();
        @endphp
        @if ($count = count($standard_posts))
            @for ($i = 0; $i < $count; $i++)
                <a class="dropdown-item" style="text-transform: capitalize;" href="{{ route('pagman.posts.posttype', ['posttype' => $standard_posts[$i]]) }}">{{ $standard_posts[$i].' Posts' }}</a>
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
        <a class="dropdown-item" data-toggle="modal" data-target="#createCustomUrlPostModal" href="#">Custom Url</a>
        <a class="dropdown-item"  href="{{ route('pagman.posts.create', ['posttype' => 'downloadable']) }}">Downloadable</a>
        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header">Template</h6>
        <a class="dropdown-item" href="#">Slider</a>
        <a class="dropdown-item" href="#">After divider action</a>
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

            <!-- filter search posts select posts -->
            <!-- Posts Table -->
            <div class="col-lg-9">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @include('pagman::core.includes.tables.postsTable', ['posts' => $posts])
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('pagman::core.includes.modals.createCustomUrlPostModal')

@endsection