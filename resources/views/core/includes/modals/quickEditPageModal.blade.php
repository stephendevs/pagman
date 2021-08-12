<!-- Modal -->
<div class="modal fade" id="{{ 'quickEditPageModal'.$page->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Page</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
           <form action="">
                <div class="modal-body">
                    <div class="row">
                        
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input type="text" class="title form-control" name="title"  id="title" placeholder="Page Title" value="{{ (old('title')) ? old('title') : $page->title }}" required  />
                                <small class="error text-danger error-title"">
                                    hello
                                </small>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group mb-0">
                                <label for="pageSlug">{{ __('Slug') }}</label>
                                <input type="text" class="page-slug form-control" name="page_slug"  id="pageSlug" placeholder="Page Slug" value="{{ (old('slug')) ? old('title') : $page->slug }}" required  />
                                <small class="error text-danger error-page-slug">
                                    hello
                                </small>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group mb-0">
                                <label for="parent">{{ __('Parent Page') }}</label>
                                <select name="parent" id="" class="form-control"">
                                    <option value="">No Parent</option>
                                    <option value="">About Us</option>
                                </select>
                                <small class="error text-danger error-page-slug"">
                                    hello
                                </small>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <label for="order">Order</label>
                            <input type="text" name="order" placeholder="Order" class="form-control" />
                            <small class="error text-danger error-order">
                                hello
                            </small>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group mb-0">
                                <label for="status">{{ __('Status') }}</label>
                                <select name="status" id="" class="form-control"">
                                    <option value="">Published</option>
                                    <option value="">Pending</option>
                                </select>
                                <small class="error text-danger error-status"">
                                    hello
                                </small>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
           </form>
        </div>
    </div>
</div>