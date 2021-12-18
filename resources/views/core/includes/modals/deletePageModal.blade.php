
<!-- Modal -->
<div class="modal fade" id="{{ 'deletePageModal'.$page->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Page Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <p>
                    {{ 'Are you sure you want to delete page: '.$page->name }}
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <a href="{{ route('pagmanPageDestroy', ['id' => $page->id]) }}" class="btn btn-danger btn-sm">Continue</a>
            </div>
        </div>
    </div>
</div>