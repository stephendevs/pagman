<form action="{{ route('pagmanPageStore') }}" method="POST" id="createPageForm">
    @csrf
    <div class="row">

        <div class="col-lg-8">
           <div class="card shadow-sm pt-1 pb-5">
               <div class="card-body">

                    <!-- page title -->
                    <div class="form-group">
                        <label for="title">{{ __('Title') }}</label>
                        <input type="text" class="title form-control" name="title"  id="title" placeholder="Page Title" value="{{ old('title') }}"   />
                        <small class="error text-danger error-title"">
                            {{ $errors->first('title') }}
                        </small>
                    </div>

                    <!-- page content -->
                    <div class="form-group">
                        <textarea name="content" id="" cols="30" rows="10" class="form-control" id="content"></textarea>
                        <small class="error text-danger error-content"">
                            {{ $errors->first('content') }}
                        </small>
                    </div>
                    <div class="mt-2">
                        <div class="alert alert-success d-none"></div>
                        <div class="alert alert-danger d-none"></div>
                    </div>
                   
               </div>
           </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-sm pt-1 pb-5">
                <div class="card-body">
                     <!-- Page slug -->
                     <div class="form-group">
                        <label for="pageSlug">{{ __('Slug') }}</label>
                        <input type="text" class="page-slug form-control" name="slug"  id="pageSlug" placeholder="Page Slug" value="{{ old('slug') }}"  />
                        <small class="error text-danger error-page-slug">
                            {{ $errors->first('slug') }}
                        </small>
                    </div>
                    <!-- page url -->
                    <div class="form-group">
                        <label for="pageSlug">{{ __('URL') }}</label>
                        <input type="url" class="form-control" name="url"  id="url" placeholder="Page Url" value="{{ (old('url')) ? old('url') : url('/') }}"  />
                        <small class="error text-danger error-url">
                            {{ $errors->first('url') }}
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="" cols="30" rows="4" class="form-control" placeholder="Page Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="parentPage">{{ 'Select Parent Page' }}</label>
                        @if (count($pages))
                            <select name="parent_page" id="" class="form-control">
                                <option value="0" selected>--no parent page--</option>
                                @foreach ($pages as $page)
                                    <option value="{{ $page->id }}">{{ $page->name }}</option>
                                @endforeach
                            </select>
                        @else
                        <select name="parent_page" id="" class="form-control">
                            <option value="0" selected>No Pages</option>
                        </select>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mt-3 offset-lg-8">
            <button type="submit" class="btn btn-primary float-right" style="width: 100%;">{{ __('Save Page') }}</button>
        </div>


    </div>
    
   </form>