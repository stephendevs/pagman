<!-- Create Page Modal -->
<div class="modal fade" id="createPageModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Page</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
           <form action="{{ route('pagmanPageStore') }}" method="POST" class="create-page-modal-form">
            @csrf
            <div class="modal-body row">
                
                <!-- Page Title -->
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="title">{{ __('Title') }}</label>
                        <input type="text" class="title form-control" name="title"  id="title" placeholder="Page Title" value="{{ old('title') }}"   />
                        <small class="error text-danger error-title"">
                            {{ $errors->first('title') }}
                        </small>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group mb-0">
                        <label for="pageSlug">{{ __('Slug') }}</label>
                        <input type="text" class="page-slug form-control" name="slug"  id="pageSlug" placeholder="Page Slug" value="{{ old('slug') }}"  />
                        <small class="error text-danger error-page-slug">
                            {{ $errors->first('slug') }}
                        </small>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group mb-0">
                        <label for="pageSlug">{{ __('URL') }}</label>
                        <input type="url" class="form-control" name="url"  id="url" placeholder="Page Url" value="{{ (old('slug')) ? old('url') : url('/') }}"  />
                        <small class="error text-danger error-url">
                            {{ $errors->first('url') }}
                        </small>
                    </div>
                </div>

                <div class="col-lg-12 mt-3">
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

                <div class="col-lg-12 mt-3">
                    <div class="alert alert-success d-none"></div>
                </div>

                <div class="col-lg-12 mt-3">
                    <div class="alert alert-danger d-none"></div>
                </div>
                




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-primary">Add New Page</button>
            </div>
           </form>
        </div>
    </div>
</div>