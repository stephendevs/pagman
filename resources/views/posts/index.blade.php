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
        <a class="dropdown-item" href="{{ route('pagman.posts') }}">Posts</a>
        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header">Quick Access</h6>
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
        <h6 class="dropdown-header">Pages</h6>
        <a class="dropdown-item" href="{{ route('pagman.posts.create') }}">Create Page</a>
        <a class="dropdown-item" href="{{ route('pagman.posts.create') }}">Pages</a>

       
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
            <div class="col-lg-5 offset-lg-7 mb-1">
                <form action="{{ route('pagman.posts.search') }}" method="POST" class="float-right">
                    @csrf
                    <div class="input-group">
                        <div class="form-outline">
                          <input type="text" id="form1" class="form-control" name="what" placeholder="Search Posts" value="{{ old('what') }}" />
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">
                          <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
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