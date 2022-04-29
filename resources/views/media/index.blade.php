@extends(config('pagman.layout', 'pagman::core.layouts.master'))

@section('title', 'Media')
@section('pageHeading', 'Media')

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
           
            <div class="col-lg-9">
                @if (count($media))
                    <div class="row isotope-container media-container">
                        @foreach ($media as $mediaItem)
                            <div class="col-lg-3 isotope-item media-item">
                                <img src="{{ asset($mediaItem->url) }}" alt="" class="img-fluid rounded">
                                <a href="{{ route('pagman.media.show', ['id' => $mediaItem->id]) }}" class="btn btn-sm btn-primary view"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('pagman.media.destroy', ['id' => $mediaItem->id]) }}" class="btn btn-sm btn-danger trash"><i class="fa fa-trash"></i></a>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            {{ $media->links() }}
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('pagman.media.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="media" class="media-file mb-2" id="mediaFile">
                            <div class="img-placeholder"></div>
                            <small>{{ $errors->first('media') }}</small><br />
                            <button type="submit" class="btn btn-md btn-primary">Upload Media</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection