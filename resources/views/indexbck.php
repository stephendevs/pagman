@extends(config('pagman.layout', 'pagman::core.layouts.master'))

@section('requiredJs')
    <script src="{{ asset('pagman/js/app.js') }}" defer></script>
@endsection

@section('pageHeading', 'Page Manager')

@section('pageActions')
    <a href="{{ route('pagmanPages') }}" class="btn btn-sm"><i class="fa fa-fw fa-folder"></i>Pages</a>
@endsection
    
@section('content')
    <section class="mt-4">
        <div class="container-fluid">
            <div class="row">

              <div class="col-lg-4">
                <div class="card cc">
                    <div class="card-body">
                        <h6>Sync Pages</h6>
                        <form action="{{ route('pagmanSyncPages') }}" method="POST" id="syncPagesForm">
                          @csrf
                          <button type="submit" class="btn btn-sm btn-primary">Sync Pages</button>
                        </form>
                        @if (Session('fail'))
                            {{Session('fail')  }}
                        @endif
                    </div>
                </div>
            </div>


            </div>
        </div>
    </section>

    <section class="bg-primary d-none">
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