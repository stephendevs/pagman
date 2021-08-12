<form action="{{ route('lpageMenuUpdate', ['id' => $menu->id]) }}" method="POST" class="row" id="editMenuForm">
    @csrf

    <div class="col-lg-12">
        <div class="alert alert-success {{ (Session('success')) ? __('') : __('d-none') }}" id="createMenuFormAlertSuccess">
            {{ Session('success') }}
        </div>
    </div>
    <div class="col-lg-12 form-group">
        <label for="name">{{ __('Menu Name') }}</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Menu Name" value="{{ (old('name')) ? old('name') : $menu->name }}" />
        <small class="text-danger error-name">
            {{ $errors->first('name') }}
        </small>
    </div>

    <div class="col-lg-12 form-check pl-5 mb-2">
        <input type="checkbox" name="is_primary" class="form-check-input" id="primaryMenu" {{ ($menu->is_primary) ? __('checked') : __('') }} />
        <label for="primaryMenu" class="form-check-label">{{ __('Primary Menu') }}</label>
    </div>

    <div class="col-lg-12 form-check pl-5 mb-2">
        <input type="checkbox" name="footer" class="form-check-input" id="footerMenu" {{ ($menu->footer) ? __('checked') : __('') }} />
        <label for="footerMenu" class="form-check-label">{{ __('Footer Menu') }}</label>
    </div>

    <div class="col-lg-12">
        <button type="submit" class="btn btn-sm btn-primary">Update</button>
    </div>

</form>