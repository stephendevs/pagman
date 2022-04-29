@extends(config('pagman.layout', 'pagman::core.layouts.master'))

@section('title', 'Pages')
@section('pageHeading', 'Pages')

@section('pageActions')
<div class="dropdown d-inline mr-2">
    <a class="dropdown-toggle" href="{{ route('pagman.pages.create') }}"
            aria-expanded="false">
                <i class="fa fa-plus"></i> Create Page
    </a>
</div>
@endsection


@section('content')

<section class="page-section mt-4">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @if (count($pages))
                            @includeIf('pagman::core.includes.tables.pagesTable')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection