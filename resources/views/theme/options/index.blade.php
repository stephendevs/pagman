@extends(config('pagman.layout', 'pagman::core.layouts.master'))

@section('requiredJs')
    <script src="{{ asset('stephendevs/pagman/js/app.js') }}" defer></script>
@endsection

@section('pageHeading', 'Theme Options')

    
@section('content')
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                hello
            </div>
        </div>
    </div>
</section>
@endsection