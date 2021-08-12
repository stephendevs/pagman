<!-- Modal -->
<div class="modal fade" id="createMenuModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="{{ route('lpageMenuStore') }}" method="POST" class="" id="createMenuForm">
                @csrf
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="alert alert-success {{ (Session('success')) ? __('') : __('d-none') }}" id="createMenuFormAlertSuccess">
                            {{ Session('success') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('Menu Name') }}</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Menu Name" value="{{ old('name') }}" />
                        <small class="text-danger error-name">
                            {{ $errors->first('name') }}
                        </small>
                    </div>

                    <div class="form-check pl-5 mb-2">
                        <input type="checkbox" name="is_primary" class="form-check-input" id="primaryMenu">
                        <label for="primaryMenu" class="form-check-label">{{ __('Primary Menu') }}</label>
                    </div>

                    <div class="form-check pl-5 mb-2">
                        <input type="checkbox" name="footer" class="form-check-input" id="footerMenu">
                        <label for="footerMenu" class="form-check-label">{{ __('Footer Menu') }}</label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary">Create</button>
                </div>
                
            </form>
           
            
        </div>
    </div>
</div>