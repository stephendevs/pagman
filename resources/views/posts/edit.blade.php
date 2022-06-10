@extends(config('pagman.layout', 'pagman::core.layouts.master'))

@section('title', 'Posts | Edit')
@section('pageHeading', 'Edit Post')

@section('pageActions')
<div class="dropdown d-inline mr-3">
    <a class="dropdown-toggle" data-toggle="modal" data-target="#chooseMediaModal" aria-expanded="false" href="hello">
        <i class="fa fa-file"></i> Social Links
    </a>
</div>
<div class="dropdown d-inline mr-3">
    <a class="dropdown-toggle" data-toggle="modal" data-target="#chooseMediaModal" aria-expanded="false" href="hello">
        <i class="fa fa-file"></i> Contact Details
    </a>
</div>
<div class="dropdown d-inline mr-3">
    <a class="dropdown-toggle" data-toggle="modal" data-target="#chooseMediaModal" aria-expanded="false" href="hello">
        <i class="fa fa-file"></i> Add Downloadable File
    </a>
</div>
<div class="dropdown d-inline mr-5">
    <a class="dropdown-toggle" data-toggle="modal" data-target="#chooseMediaModal" aria-expanded="false" href="hello">
        <i class="fa fa-camera"></i> Add Media
    </a>
</div>

<div class="dropdown d-inline mr-2">
     <a class="dropdown-toggle" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
                <i class="fa fa-plus"></i> Create Post
    </a>
    <div class="dropdown-menu" aria-labelledby="triggerId">
        <a class="dropdown-item" href="{{ route('pagman.posts.create') }}">Standard Post</a>
        <a class="dropdown-item" href="{{ route('pagman.posts.create', ['posttype' => 'downloadable']) }}">Downloadable</a>
        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header">Template</h6>
        <a class="dropdown-item" href="#">Slider</a>
        <a class="dropdown-item" href="#">After divider action</a>
    </div>
</div>

<div class="dropdown d-inline mr-5">
    <a class="dropdown-toggle" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
                <i class="fa fa-folder"></i> Posts
    </a>
    <div class="dropdown-menu shadow" aria-labelledby="triggerId">
        <a class="dropdown-item" href="{{ route('pagman.posts') }}">All Posts</a>
    </div>
</div>
@endsection

@section('requiredJs')

@if (option('use_ckeditor_cdn', false))
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
@else
<script src="{{ asset('ckeditor/ckeditor.js') }}" defer></script>
@endif

<script src="{{ asset('isotope/isotope.pkgd.min.js') }}" defer></script>
<script src="{{ asset('pagman/js/pagman.js') }}" defer></script>
@endsection


@section('requiredCss')
<link href="{{ asset('pagman/css/pagman.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="mt-4">
    <div class="container-fluid">

       
        <!-- Edit Post Form -->
        <form action="{{ route('pagman.posts.update', ['id' => $post->id]) }}" class="row" id="editStandardPostForm" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-lg-3">
                <div class="card shadow-sm">
                    <div class="card-body">

                        

                        <!-- Post Type -->
                        <label for="postType">Post Type</label>
                        <select name="post_type" id="postType" class="form-control w-75 text-capitalize">
                            @if ($count = count($standard_posts))
                                @for ($i = 0; $i < $count; $i++)
                                    <option value="{{ $standard_posts[$i] }}" {{ ($post->post_type == $standard_posts[$i]) ? 'selected' : '' }}>{{ str_replace('_', ' ', $standard_posts[$i]) }}</option>
                                @endfor
                            @endif
                        </select>
                        <small class="text-danger">{{ $errors->first('post_type') }}</small>


                        <!-- Post Extract Text -->
                        <label for="extractText">Post Extract Text | Description</label>
                        <textarea name="extract_text" id="extractText" cols="30" rows="5" class="mt-2 form-control" placeholder="Post Extract Text">{{ (old('extract_text') != null) ? old('extract_text') : $post->extract_text  }}</textarea>
                        <small class="text-danger post-extract-error">{{ $errors->first('extract_text') }}</small>
                        <small>
                            Extract Text are optional hand-crafted summaries of your news content that can be used in your website
                        </small>
                        <hr />

                        <h6 class="mb-2 text-capitalize">Categorize your post</h6>
                        @if (count($post->categories))
                            @php
                                $categoriesIds = [];
                            @endphp
                            @foreach ($post->categories as $postCategories)
                                @php
                                    array_unshift($categoriesIds, $postCategories->id)
                                @endphp
                            @endforeach
                            @foreach ($categories as $category)
                            <div class="form-check {{ ($category->parent_id) ? 'ml-3' : '' }}">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="category[]" id="{{ 'category'.$category->id }}" value="{{ $category->id }}" {{ (in_array($category->id, $categoriesIds)) ? 'checked' : '' }}>
                                {{ $category->name }}
                                </label>
                            </div>
                            @endforeach
                        @else
                            @if (count($categories))
                                @foreach ($categories as $category)
                                <div class="form-check {{ ($category->parent_id) ? 'ml-3' : '' }}">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="category[]" id="{{ 'category'.$category->id }}" value="{{ $category->id }}">
                                    {{ $category->name }}
                                    </label>
                                </div>
                                @endforeach
                            @else
                                no categories -- click to add
                            @endif
                        @endif
                    </div>
                </div>
            </div>

            <!-- post title, name and content -->
            <div class="col-lg-6">
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <label for="title">Post Title</label>
                        <textarea name="post_title" id="title" cols="10" rows="1" class="form-control" placeholder="Post Title">{{ (old('post_title') != null) ? old('post_title') : $post->post_title  }}</textarea>
                        <small class="text-danger post-title-error">{{ $errors->first('post_title') }}</small>
                    </div>
                </div>
                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        <textarea name="post_content" id="content" class="form-control" cols="30" rows="10" >
                            {{ (old('post_content') != null) ? old('post_content') : $post->post_content  }}
                        </textarea>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">

                <!-- Post Featured Image -->
                <div class="card shadow-sm mb-3">
                    <div class="card-header">
                        <h6>Post Featured Image</h6>
                    </div>
                    <div class="card-body p-0">
                        <img src="{{ ($post->post_featured_image != null) ? asset($post->post_featured_image) : asset('pagman/img/post_featured_image.png') }}" alt="" id="imageHolderId" class="img-fluid">
                    </div>
                    <div class="card-footer">
                        <input type="file" name="post_featured_image" id="selectPostFeaturedImage" /><hr />
                        <small class="text-danger featured-image-error">
                            {{ $errors->first('post_featured_image') }}
                        </small><hr />
                        <a class="text-primary" data-toggle="collapse" href="#postImageSize" aria-expanded="false" aria-controls="contentId">
                            Standard Recommended Image Sizes
                        </a>
                        <div class="collapse" id="postImageSize">
                            <!-- here -->
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <input type="submit" class="btn btn-sm btn-primary" value="Update" />
                    </div>
                </div>

            </div>

            
        </form>

        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                @if (count($post->media))
                   <div class="card">
                        <div class="card-header">
                            <h6>Post Media</h6>
                        </div>
                       <div class="card-body">
                            <div class="row media-container isotope-container">
                                <div class="col-lg-3 media-item isotope-item">
                                    <img src="{{ asset('pagman/img/post_featured_image.png') }}" alt="" class="img-fluid">
                                </div>
                                @foreach ($post->media as $mediaItem)
                                    <div class="col-lg-3 media-item isotope-item">
                                        <img src="{{ asset($mediaItem->url) }}" alt="" class="img-fluid rounded">
                                        <a href="{{ route('pagman.media.destroy', ['id' => $mediaItem->id]) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                @endforeach
                            </div>
                       </div>
                   </div>
                @else
                hello
                @endif
            </div>
        </div>
    </div>
</section>


<!-- Custom Modal -->
<div class="modal fade" id="chooseMediaModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-url="{{ route('pagman.media') }}" data-baseurl="{{ url('/') }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Choose Media</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body row">
                <div class="col-lg-4">
                    @for ($i = 0; $i <= 3; $i++)
                        <img src="" alt="" id="{{ 'image'.$i }}" class="isotope-item img-fluid rounded mb-1 selected-media" data-id="" data-postid="{{$post->id }}" data-baseurl="{{ url(config('pagman.route_prefix', 'dashboard')) }}">
                    @endfor
                </div>
                <div class="col-lg-4">
                    @for ($i = 4; $i <= 7; $i++)
                        <img src="" alt="" id="{{ 'image'.$i }}" class="isotope-item img-fluid rounded mb-1 selected-media" data-id="" data-postid="{{$post->id }}" data-baseurl="{{ url(config('pagman.route_prefix', 'dashboard')) }}">
                    @endfor
                </div>
                <div class="col-lg-4">
                    @for ($i = 8; $i <= 11; $i++)
                        <img src="" alt="" id="{{ 'image'.$i }}" class="isotope-item img-fluid rounded mb-1 selected-media" data-id="" data-postid="{{$post->id }}" data-baseurl="{{ url(config('pagman.route_prefix', 'dashboard')) }}">
                    @endfor
                </div>
                <div class="col-lg-4">
                    <form action="" enctype="multipart/form-data">
                        <input type="file" />
                        <img src="{{ asset('pagman/img/post_featured_image.png') }}" alt="" class="img-fluid mt-3 selected-media">
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                hello
            </div>
        </div>
    </div>
</div>

@endsection