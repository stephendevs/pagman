@extends(config('pagman.layout', 'pagman::core.layouts.master'))

@section('title', 'Pagman | Edit Page')
@section('pageHeading', 'Edit Page')

@section('pageActions')
    <a href="{{ route('pagman') }}" class="btn btn-sm"><i class="fa fa-fw fa-home"></i>Page Manger</a>
    <a href="{{ route('pagmanPages') }}" class="btn btn-sm"><i class="fa fa-fw fa-folder"></i>Pages</a>
    <a href="{{ route('pagmanPageCreate') }}"  class="btn btn-sm"><i class="fa fa-fw fa-plus"></i>Create Page</a>
@endsection

@section('requiredJs')
    <script src="{{ asset('ckeditor/ckeditor.js') }}" defer></script>
    <script src="{{ asset('stephendevs/pagman/js/page/page.js') }}" defer></script>
@endsection

@section('content')

    <section class="page-section mt-4">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-lg-12">
                    @includeIf('pagman::core.includes.forms.editPageForm', ['some' => 'data'])
                </div>
            </div>
        </div>
    </section>

@endsection