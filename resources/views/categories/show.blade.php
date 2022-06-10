@extends(config('pagman.layout', 'pagman::core.layouts.master'))

@section('title', 'Category')
@section('pageHeading', 'Category Details')

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
        <a class="dropdown-item" href="{{ route('pagman.pages.create') }}">Create Page</a>
        <a class="dropdown-item" href="{{ route('pagman.pages') }}">Pages</a>

       
    </div>
</div>
@endsection

@section('requiredCss')
<link href="{{ asset('pagman/css/pagman.css') }}" rel="stylesheet">
@endsection




@section('content')
<section class="mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 offset-lg-7 mb-1">
            </div>
        </div>
        <div class="row">
            
        </div>
    </div>
</section>

@endsection