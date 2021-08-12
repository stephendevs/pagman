<!-- Modal -->
<div class="modal fade" id="{{ 'deleteMenuModal'.$menu->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <p>
                    {{ 'Are you sure, you wnat to delete Menu : '.$menu->name }}
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <a href="{{ route('lpageMenuDestroy', ['id' => $menu->id]) }}" class="btn btn-danger btn-sm">Save</a>
            </div>
        </div>
    </div>
</div>