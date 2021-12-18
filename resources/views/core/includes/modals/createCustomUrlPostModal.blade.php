<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="createCustomUrlPostModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Custom URL Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="{{ route('pagman.posts.store') }}" method="POST" id="createCustomUrlPostForm">
                @csrf
                <div class="modal-body">

                    <label for="postTitle">Name | Title</label>
                    <input type="text" name="post_title" class="form-control" placeholder="Text" id="postTitle" />
                    <small class="text-danger error-title">{{ $errors->first('title') }}</small><br />

                    <label for="target">URL Target</label>
                    <select name="post_content[]" id="target" class="form-control">
                        <option value="_self" selected>Self</option>
                        <option value="_blank">Blank</option>
                        <option value="_parent">Parent</option>
                        <option value="_top">Top</option>
                    </select><br />

                    <label for="url">URL</label>
                    <input type="url" name="post_content[]" class="form-control" placeholder="URL" />

                    <label for="h">Post Type</label>
                    <input type="text" name="post_type" class="form-control" value="custom_url" /><br />

                    <small class="text-success success">hello</small>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
           
        </div>
    </div>
</div>