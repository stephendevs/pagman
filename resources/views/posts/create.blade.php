@extends(config('pagman.layout', 'pagman::core.layouts.master'))

@section('title', 'Posts | Create')
@section('pageHeading', (request('posttype')) ? 'Posts | Create '.request('posttype').' Post' : 'Posts | Create New Post')

@section('pageActions')
<div class="dropdown d-inline mr-2">
    <a class="dropdown-toggle" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
                <i class="fa fa-file-o"></i> Pages
    </a>
    <div class="dropdown-menu" aria-labelledby="triggerId">
        <h6 class="dropdown-header">Pages</h6>
        <a class="dropdown-item" href="{{ route('pagman.pages.create') }}">Create Page</a>
        <a class="dropdown-item" href="{{ route('pagman.pages') }}">Pages</a>

    </div>
</div>
<div class="dropdown d-inline mr-5">
    <a class="dropdown-toggle" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
                <i class="fa fa-folder"></i> Posts
    </a>
    <div class="dropdown-menu shadow" aria-labelledby="triggerId">
        <a class="dropdown-item" href="{{ route('pagman.posts') }}">All Posts</a>
        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header">Quick Access</h6>
    </div>
</div>

@endsection

@section('requiredJs')

@if (option('use_ckeditor_cdn', false))
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
@else
<script src="{{ asset('ckeditor/ckeditor.js') }}" defer></script>
@endif

<script src="{{ asset('pagman/js/pagman.js') }}" defer></script>
@endsection


@section('requiredCss')
<link href="{{ asset('pagman/css/pagman.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="mt-4">
    <div class="container-fluid">
        <!-- Create Post Form -->
        <form action="{{ route('pagman.posts.store') }}" class="row" id="createStandardPostForm" method="POST" enctype="multipart/form-data">
            @csrf
           
            <!-- Column 1 -->
            <div class="col-lg-3">
                <div class="card shadow-sm">
                    <div class="card-body">

                        <!-- Post Type -->
                        <label for="postType">Post Type</label>
                        <select name="post_type" id="postType" class="form-control w-100 text-capitalize">
                            @if ($count = count($standard_posts))
                                @for ($i = 0; $i < $count; $i++)
                                    <option value="{{ $standard_posts[$i] }}" {{ ($standard_posts[$i] == old('post_type') ? 'selected' : '') }}>{{ str_replace('_', ' ', $standard_posts[$i]) }}</option>
                                @endfor
                            @endif
                        </select>
                        <small class="text-danger">{{ $errors->first('post_type') }}</small><br />
                        <!-- Post Extract Text -->
                        <label for="extractText">Post Extract Text | Description</label>
                        <textarea name="extract_text" id="extractText" cols="30" rows="5" class="mt-2 form-control" placeholder="Post Extract Text">{{ old('extract_text') }}</textarea>
                        <small class="text-danger post-extract-error">{{ $errors->first('extract_text') }}</small>
                        <small>
                            Extract Text are optional hand-crafted summaries of your news content that can be used in your website
                        </small>
                    </div>
                </div>
            </div>

            <!-- post title, name and content -->
            <div class="col-lg-6">
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <label for="title">Post Title</label>
                        <textarea name="post_title" id="title" cols="10" rows="1" class="form-control" placeholder="Post Title">{{ old('post_title') }}</textarea>
                        <small class="text-danger post-title-error">{{ $errors->first('post_title') }}</small>
                    </div>
                </div>
                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        <textarea name="post_content" id="content" class="form-control" cols="30" rows="10" >
                            {{ old('post_content') }}
                        </textarea>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">

                <!-- Post Featured Image -->
                <div class="card shadow-sm mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-8"><h6>Post Featured Image</h6></div>
                            <div class="col-lg-4"><input type="file" name="post_featured_image" id="selectPostFeaturedImage" class="" /></div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <img src="{{ asset('pagman/img/post_featured_image.png') }}" alt="" id="imageHolderId" class="img-fluid">
                    </div>
                    <div class="card-footer">
                        <small class="text-danger featured-image-error">
                            {{ $errors->first('post_featured_image') }}
                        </small>
                    </div>
                </div>

                <!-- Post Icon - posts may have icons or not -->
                @if (option('asign_icons_to_posts', false))
                    <div class="card shadow-sm mb-3">
                        <div class="card-header">
                            <h6>Post Icon</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-lg-6">
                                    <input type="file" name="post_icon" class="" id="iconInput"  />
                                </div>
                                <div class="col-lg-6">
                                    <select name="icon_format" id="iconFormat" class="form-control">
                                        <option value="img" selected>Image</option>
                                        <option value="css_class">CSS Class</option>
                                    </select>
                                </div>
                            </div>
                            <img src="{{ asset('pagman/img/post_featured_image.png') }}" alt="" id="imageHolderId" class="w-25">
                        </div>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body p-2 text-right">
                        <input type="submit" value="Save post" class="btn btn-md btn-primary" />
                    </div>
                </div>
               

            </div>

            <div class="col-lg-12 mb-3">
                
            </div>

        </form>
    </div>
</section>

@endsection