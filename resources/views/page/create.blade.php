@extends(config('pagman.layout', 'pagman::core.layouts.master'))

@section('title', 'Create Page')
@section('pageHeading', 'Create Page')

@section('pageActions')
<div class="dropdown d-inline mr-2">
    <a class="dropdown-toggle" href="{{ route('pagman.posts.create') }}"
            aria-expanded="false">
                <i class="fa fa-plus"></i> Create Post
    </a>
</div>
<div class="dropdown d-inline mr-5">
    <a class="dropdown-toggle" aria-haspopup="true" href="{{ route('pagman.posts') }}"
            aria-expanded="false">
                <i class="fa fa-folder"></i> Posts
    </a>
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

@section('content')
<section class="mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @include('pagman::core.includes.alerts.createdresponse')
            </div>
        </div>
        <form action="{{ route('pagman.pages.store') }}" class="row" id="" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Column 1 -->
            <div class="col-lg-3">
                <div class="card shadow-sm">
                    <div class="card-body">

                        <!-- Page Key -->
                        @if (count($page_keys))
                        <label for="pageKey">Page Key</label>
                        <select name="post_key" id="" class="form-control">
                            <option value="select" selected>{{ _('Select Or Ignore') }}</option>
                            @for ($i = 0; $i < count($page_keys); $i++)
                                <option value="{{ $page_keys[$i] }}">{{ _($page_keys[$i]) }}</option>
                            @endfor
                        </select>
                        <small class="text-danger post-key-error">{{ $errors->first('post_key') }}</small>
                        @endif
                       

                        <!-- Post Extract Text -->
                        <label for="extractText">Page Extract Text | Description</label>
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
                        <label for="title">Page Title</label>
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
                        <h6>Post Featured Image</h6>
                    </div>
                    <div class="card-body p-0">
                        <img src="{{ asset('pagman/img/post_featured_image.png') }}" alt="" id="imageHolderId" class="img-fluid">
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
                        <input type="submit" value="save" class="btn btn-sm btn-primary" />
                    </div>
                </div>

            </div>
            <div class="col-lg-12 text-center text-success success"></div>
            <div class="col-lg-12 text-center text-danger error"></div>
        </form>
    </div>
</section>
@endsection