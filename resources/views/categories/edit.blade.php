@extends(config('pagman.layout', 'pagman::core.layouts.master'))

@section('title', 'Categories')
@section('pageHeading', 'Categories')

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

@section('requiredJs')
<script src="{{ asset('pagman/js/pagman.js') }}" defer></script>
@endsection

@section('requiredCss')
<link href="{{ asset('pagman/css/pagman.css') }}" rel="stylesheet">
@endsection




@section('content')
<section class="mt-4">
    <div class="container-fluid">
        <div class="row">
           
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('pagman.categories.update', ['id' => $category->id])}}" method="POST" autocomplete="off" id="">
                            @csrf
                            <label for="name">Category Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Category Name" value="{{ (old('name')) ? old('name') : $category->name }}" id="name" />
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ old('description') }}</textarea>
                            <small class="text-danger">{{ $errors->first('description') }}</small>
                            <label for="parent">Parent Category</label>
                            <select name="parent" id="parent" class="form-control">
                                <option value="{{ null }}" selected>Select Parent</option>
                                @if (count($categories))
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <button type="submit" class="btn btn-md btn-primary float-right mt-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection