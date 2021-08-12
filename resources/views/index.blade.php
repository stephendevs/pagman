@extends(config('lpage.master_layout', 'lpage::core.layouts.master'))

@section('pageHeading', 'Page Manager')

@section('pageActions')
    <a href="{{ route('lpageMenus') }}" class="btn btn-sm"><i class="fa fa-fw fa-list"></i>Menus</a>
    <a href="{{ route('lpagePages') }}" class="btn btn-sm"><i class="fa fa-fw fa-folder"></i>Pages</a>
@endsection
    
@section('content')
    <section>
        <div class="container-fluid">
            <div class="row">

              <div class="col-lg-12">
                @if (count($pages))
                  @foreach ($pages as $key => $value)
                      <a href="{{ url($value['url']) }}">{{ $value['name'] }}</a>
                  @endforeach
                @else
                    
                @endif
              </div>

                <!-- Pages Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow-sm h-100">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ __('Pages') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ '5' }}</div>
                          </div>
                          <div class="col-auto">
                            <i class="fa fa-clipboard fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

                <!-- Spl Pages Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow-sm h-100">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ __('Spl Pages') }}</div>
                            <div>
                                <span class="font-weight-bold text-gray-800">{{ '2' }} </span>
                                <a href="" class="btn btn-sm mt-0">Sync</a>
                            </div>
                          </div>
                          <div class="col-auto">
                            <i class="fa fa-clipboard fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
  
                 <!-- Earnings (Monthly) Card Example -->
                 <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow-sm h-100">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                            <div class="row no-gutters align-items-center">
                              <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                              </div>
                              <div class="col">
                                <div class="progress progress-sm mr-2">
                                  <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

                 <!-- Pending Requests Card Example -->
                 <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow-sm h-100">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-3">

                </div>

                <div class="col-lg-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="p-2">
                                <button class="btn btn-sm btn-success" data-toggle="collapse" data-target="#createPageFormWrapper">Create Page</button>
                            </div>
                            <div class="collapse" id="createPageFormWrapper">
                                <form action="" class="row" id="">

                                    <div class="col-lg-4 form-group">
                                        <label for="name">{{ __('Page Name') }}</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required />
                                        <small class="text-danger">
                                           {{ $errors->first('name') }}
                                        </small>
                                    </div>

                                    <div class="col-lg-4 form-group">
                                        <label for="slug">{{ __('Page Slug') }}</label>
                                        <input type="text" name="slug" class="form-control" placeholder="Slug" value="{{ old('slug') }}" required />
                                        <small class="text-danger">
                                           {{ $errors->first('slug') }}
                                        </small>
                                    </div>

                                    <div class="col-lg-4 form-group">
                                        <label for="menu">{{ __('Menu') }}</label>
                                        <select name="menu" id="menu" class="form-control">
                                            <option value="" selected>Main Menu</option>
                                            <option value="">Kdg Menu</option>
                                        </select>
                                        <small class="text-danger">
                                           {{ $errors->first('menu') }}
                                        </small>
                                    </div>


                                    <div class="col-lg-12 form-group">
                                        <label for="title">{{ __('Page Title') }}</label>
                                        <textarea name="title" id="" cols="30" rows="2" class="form-control"></textarea>
                                        <small class="text-danger">
                                           {{ $errors->first('title') }}
                                        </small>
                                    </div>
                               
                                    <div class="col-lg-4 form-group">
                                        <label for="isChild">{{ __('Page Title') }}</label>
                                        <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}" required />
                                        <small class="text-danger">
                                           {{ $errors->first('title') }}
                                        </small>
                                    </div>

                                    <div class="col-lg-4 form-group">
                                        <label for="title">{{ __('Page Title') }}</label>
                                        <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}" required />
                                        <small class="text-danger">
                                           {{ $errors->first('title') }}
                                        </small>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection