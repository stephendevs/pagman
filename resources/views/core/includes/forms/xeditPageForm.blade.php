<form action="{{ route('pagmanPageUpdate', ['id' => $page->id]) }}" method="POST">
    @csrf
    <div class="modal-body row">
                
        <div class="col-lg-6">
            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input type="text" class="form-control" name="name"  id="title" placeholder="Page Name" value="{{ (old('name')) ? old('name') : $page->name }}"   />
                <small class="error text-danger error-name"">
                    {{ $errors->first('name') }}
                </small>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="title">{{ __('Title') }}</label>
                <input type="text" class="title form-control" name="title"  id="title" placeholder="Page Title" value="{{ (old('title')) ? old('title') : $page->title }}"   />
                <small class="error text-danger error-title"">
                    {{ $errors->first('title') }}
                </small>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group mb-0">
                <label for="pageSlug">{{ __('Slug') }}</label>
                <input type="text" class="page-slug form-control" name="slug"  id="pageSlug" placeholder="Page Slug" value="{{ (old('slug')) ? old('slug') : $page->slug }}"  />
                <small class="error text-danger error-page-slug">
                    {{ $errors->first('slug') }}
                </small>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group mb-0">
                <label for="pageSlug">{{ __('Slug') }}</label>
                <input type="url" class="form-control" name="url"  id="url" placeholder="Page Url" value="{{ (old('slug')) ? old('url') : $page->url }}"  />
                <small class="error text-danger error-url">
                    {{ $errors->first('url') }}
                </small>
            </div>
        </div>

        <div class="col-lg-6 mt-3">
            <label for="parentOrChild">{{ 'Parent Or Child Page' }}</label>
            <select name="parent_child" id="parentOrChild" class="form-control">
                <option value="0">Parent Or Child</option>
                <option value="1" {{ ($page->is_parent) ? __('selected') : __('') }}>Is Parent Page</option>
                <option value="2" {{ ($page->is_child) ? __('selected') : __('') }}>Is Child Page</option>
            </select>
        </div>

        <div class="form-group mt-3 col-lg-6 collapse" id="parentPageCollapse">
            <label for="parentPage">{{ __('Change Parent Page') }}</label>
            <select name="parent_id" id="parentPage" class="form-control"">
                @if (count($pages))
                    @foreach ($pages as $page)
                        <option value="{{ $page->id }}">{{ $page->name }}</option>
                    @endforeach
                @else
                <option value="0">No Pages Available</option>

                @endif
            </select>
            <small class="error text-danger error-page-slug"">
                hello
            </small>
        </div>
        <div class="col-lg-12 mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>


    </div>
    
   </form>