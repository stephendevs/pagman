@extends(config('lpage.master_layout', 'lpage::core.layouts.master'))

@section('pageHeading', 'Pages')

@section('pageActions')
    <a href="{{ route('lpageManager') }}" class="btn btn-sm"><i class="fa fa-fw fa-home"></i>Page Manger</a>
    <a href="{{ route('lpagePageCreate') }}" data-toggle="modal" data-target="#createPageModal" class="btn btn-sm"><i class="fa fa-fw fa-plus"></i>Create Page</a>
@endsection

@section('requiredJs')
    <script src="{{ asset('lpage/js/page/page.js') }}" defer></script>
@endsection

@section('content')

    <section class="page-section mt-4">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            @if (count($pages))
                                @includeIf('lpage::core.includes.tables.pagesTable', ['some' => 'data'])
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @includeIf('lpage::core.includes.modals.createPageModal', ['some' => 'data'])
@endsection