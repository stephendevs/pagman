<div class="alert alert-primary alert-dismissible fade {{ (session('updated')) ? 'show' : 'd-none' }}" role="alert" id="created">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>Holy guacamole!</strong> <span class="message">{{ session('updated') }}</span>
</div>

