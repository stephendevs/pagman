@extends(config('pagman.layout', 'pagman::core.layouts.master'))

@section('title', 'Posts | Edit')
@section('pageHeading', 'Edit Post')

@section('pageActions')
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
@endsection

@section('requiredJs')
<script src="{{ asset('ckeditor/ckeditor.js') }}" defer></script>
<script src="{{ asset('pagman/js/posts.js') }}" defer></script>
@endsection


@section('requiredCss')
<link href="{{ asset('stephendevs/pagman/css/posts.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="mt-4">
    <div class="container-fluid">

       
        @if (request('posttype') == 'downloadable')
        <!-- create Post Form -->
        <form action="{{ route('pagman.posts.store') }}" class="row" id="createStandardPostForm" method="POST">
            @csrf
            <div class="col-lg-3 offset-lg-9">
                
            </div>

            <div class="col-lg-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <!-- Post Type -->
                        <label for="postType">Post Format</label>
                        <select name="post_type" id="postType" class="form-control w-75">
                            <option value="post" selected>Standard</option>
                            <option value="post">Post</option>
                            <option value="page">Page</option>
                        </select>
                        <small class="text-danger">{{ $errors->first('post_type') }}</small>

                        <!-- Post Title -->
                        <label for="title">Post Title</label>
                        <textarea name="post_title" id="title" cols="10" rows="4" class="form-control" placeholder="Post Title">{{ old('post_title') }}</textarea>
                        <small class="text-danger">{{ $errors->first('post_title') }}</small>
                    </div>
                </div>
            </div>

            <!-- post title, name and content -->
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <input type="file">
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        Posts are pretty much everything that you may want to display on the website template. its up to you how to store and display the post content. The post content can be stored as <b>HTML</b>, <b>JSON</b>, <b>String</b>, <b>URL</b> or <b>Array</b>.
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="dropup">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                        Save Post
                                    </button>
                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                <input type="submit" value="Save" class="dropdown-item" />
                                <input type="submit" value="Save & Publish" class="dropdown-item" />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        @else
        <!-- create Post Form -->
        <form action="{{ route('pagman.posts.update', ['id' => $post->id]) }}" class="row" id="editStandardPostForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-3 offset-lg-9">
                
            </div>

            <div class="col-lg-3">
                <div class="card shadow-sm">
                    <div class="card-body">

                        <!-- Post Type -->
                        <label for="postType">Post Format | Type</label>
                        <select name="post_type" id="postType" class="form-control w-75">
                            
                            @php
                            $standard_posts = standard_post_types();
                            @endphp
                            @if ($count = count($standard_posts))
                                @for ($i = 0; $i < $count; $i++)
                                    @if ($post->post_type == $standard_posts[$i])
                                    <option value="{{ $standard_posts[$i] }}" selected>{{ $standard_posts[$i] }}</option>
                                    @else
                                    <option value="{{ $standard_posts[$i] }}">{{ $standard_posts[$i] }}</option>
                                    @endif
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
                        <img src="{{ ($post->post_featured_image != null) ? asset('storage/'.$post->post_featured_image) : asset('pagman/img/post_featured_image.png') }}" alt="" id="imageHolderId" class="img-fluid">
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
            <div class="col-lg-12 text-center text-success success"></div>
            <div class="col-lg-12 text-center text-danger error"></div>
        </form>
        @endif
    </div>
</section>

@endsection