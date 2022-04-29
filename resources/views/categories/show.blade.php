@extends(config('pagman.layout', 'pagman::core.layouts.master'))

@section('title', 'Media')
@section('pageHeading', 'Media Details')

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
<script src="{{ asset('isotope/isotope.pkgd.min.js') }}" defer></script>
<script src="{{ asset('pagman/js/pagman.js') }}" defer></script>
@endsection

@section('requiredCss')
<link href="{{ asset('pagman/css/pagman.css') }}" rel="stylesheet">
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
           
            <div class="col-lg-6">
               <img src="{{ asset($mediaItem->url) }}" alt="{{ ($mediaItem->description) ?? 'No description indicated' }}" class="img-fluid">
            </div>
            <div class="col-lg-3">
               <div class="card">
                   <div class="card-body">
                       <a href="{{ route('pagman.media.destroy', ['id' => $mediaItem->id]) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                       <hr />
                       <p>Media Type : <b>{{ \File::extension($mediaItem->url) }}</b></p><hr />
                       <p>Uploaded : <b>{{ $mediaItem->created_at }}</b></p><hr />
                       <form action="{{ route('pagman.media.update', ['id' => $mediaItem->id]) }}" method="POST">
                           @csrf
                           <textarea name="description" id="" cols="30" rows="5" class="form-control" placeholder="Alt Text">{{ ($mediaItem->description) ?? '' }}</textarea>
                           <button type="submit" class="btn btn-sm btn-primary mt-2 float-right">Update</button>
                       </form>
                   </div>
               </div>
            </div>
        </div>
    </div>
</section>

@endsection