<form action="{{ route('pagman.menus.store') }}" method="POST" class="row" id="createMenuForm">
    @csrf

    <div class="col-lg-12">
        <div class="alert alert-success {{ (Session('success')) ? __('') : __('d-none') }}" id="createMenuFormAlertSuccess">
            {{ Session('success') }}
        </div>
    </div>
    <div class="col-lg-12 form-group">
        <label for="name">{{ __('Menu Name') }}</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Menu Name" value="{{ old('name') }}" />
        <small class="text-danger error-name">
        </small>
    </div>
    <!-- determine the theme registered menu locations -->
    <!--
    <div class="col-lg-12 form-check pl-5 mb-2">
        <input type="checkbox" name="is_primary" class="form-check-input" id="primaryMenu">
        <label for="primaryMenu" class="form-check-label">{{ __('Primary Menu') }}</label>
    </div>

    <div class="col-lg-12 form-check pl-5 mb-2">
        <input type="checkbox" name="footer" class="form-check-input" id="footerMenu">
        <label for="footerMenu" class="form-check-label">{{ __('Footer Menu') }}</label>
    </div>
     -->

    <div class="col-lg-12">
        <button type="submit" class="btn btn-sm btn-primary">Create</button>
    </div>

</form>