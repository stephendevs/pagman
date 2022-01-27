@extends(config('pagman.layout', 'pagman::core.layouts.master'))

@section('requiredJs')
    <script src="{{ asset('stephendevs/pagman/js/app.js') }}" defer></script>
@endsection

@section('pageHeading', 'Dashboard')

@section('pageActions')

@endsection
    
@section('content')
<section class="mt-4">
    <div class="container-fluid">
        <div class="row">


        </div>
    </div>
</section>
@endsection