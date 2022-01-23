@extends(config('pagman.layout', 'pagman::core.layouts.master'))

@section('requiredJs')
    <script src="{{ asset('stephendevs/pagman/js/app.js') }}" defer></script>
@endsection

@section('pageHeading', 'Customize Site')

    
@section('content')
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
              <div class="card shadow-sm">
                  <div class="card-body">
                      <ul class="nav nav-tabs" id="customizationTab" role="tablist">
                          <li class="nav-item">
                              <a href="#siteheader" class="nav-link active" data-toggle="tab">Header</a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">Another link</a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link disabled">Disabled</a>
                          </li>
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane show active" id="siteheader">
                                hello
                            </div>
                            
                        </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
</section>
@endsection