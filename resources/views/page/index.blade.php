@extends(config('pagman.layout', 'pagman::core.layouts.master'))

@section('title', 'Pagman | Pages')
@section('pageHeading', 'Pages')

@section('pageActions')
    <a href="{{ route('pagman') }}" class="btn btn-sm"><i class="fa fa-fw fa-home"></i>Page Manger</a>
    <a href="{{ route('pagmanPageCreate') }}" data-toggle="modal" data-target="#createPageModal" class="btn btn-sm"><i class="fa fa-fw fa-plus"></i>Quickly Add  Page</a>
    <a href="{{ route('pagmanPageCreate') }}" class="btn btn-sm"><i class="fa fa-fw fa-plus"></i>Add New Page</a>
@endsection

@section('requiredJs')
    <script src="{{ asset('stephendevs/pagman/js/page/page.js') }}" defer></script>
@endsection

@section('content')

    <section class="page-section mt-4">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            @if (count($pages))
                                @includeIf('pagman::core.includes.tables.pagesTable', ['some' => 'data'])
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @includeIf('pagman::core.includes.modals.createPageModal', ['some' => 'data'])
@endsection