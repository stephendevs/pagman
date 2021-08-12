@extends(config('lpage.master_layout', 'lpage::core.layouts.master'))

@section('pageHeading', 'Create Page')

@section('pageActions')
    <a href="{{ route('lpageManager') }}" class="btn btn-sm"><i class="fa fa-fw fa-home"></i>Page Manger</a>
    <a href="{{ route('lpagePages') }}" class="btn btn-sm"><i class="fa fa-fw fa-folder"></i>Pages</a>
@endsection

@section('requiredJs')
    <script src="{{ asset('lpage/js/page/page.js') }}" defer></script>
@endsection

@section('content')

    <section class="page-section mt-4">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">{{ __('Create Page') }}</h6>
                        </div>
                        <div class="card-body">
                            @includeIf('lpage::core.includes.forms.createPageForm', ['some' => 'data'])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection