<div class="alert alert-danger alert-dismissible fade {{ (session('deleted')) ? 'show' : 'd-none' }}" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>Holy guacamole!</strong> {{ session('deleted') }}
</div>

<div class="alert alert-primary alert-dismissible fade {{ (session('updated')) ? 'show' : 'd-none' }}" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>Holy guacamole!</strong> {{ session('updated') }}
</div>

<div class="alert alert-success alert-dismissible fade {{ (session('created')) ? 'show' : 'd-none' }}" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>Holy guacamole!</strong> {{ session('created') }}
</div>

