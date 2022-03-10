@extends(config('pagman.layout', 'pagman::core.layouts.master'))

@section('title', 'Posts')
@section('pageHeading', 'CMS Settings')

@section('pageActions')

@endsection

@section('requiredJs')
<script src="{{ asset('stephendevs/pagman/js/posts.js') }}" defer></script>
@endsection



@section('content')
<section class="mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <form action="{{ route('pagman.settings.update') }}" method="POST" class="" enctype="multipart/form-data" id="optionsForm" >
                    @csrf
                   <div class="row">

                    <!-- Lad Settings -->
                       <div class="col-lg-12">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12"><h6 class="mb-0">Posts</h6><hr /></div>
                                        <div class="col-lg-12">
                                            <label for="postsCount">No of posts to display on listing.</label>
                                            <select name="posts_pagination_count" id="postsCount" class="form-control w-25">
                                                <option value="4">4</option>
                                                <option value="6">6</option>
                                                <option value="8">8</option>
                                                <option value="10">10</option>
                                                <option value="15">15</option>
                                                <option value="25">25</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2">
                                           
                                        </div>


                                    </div>
                                </div>
                            </div>
                       </div>
                       <!-- // Lad Settings // -->

                       <!-- Other Settings views -->
                       <!-- / Other Settings views -->

                       <div class="col-lg-12">
                           <div class="card mt-3 shadow-sm">
                               <div class="card-body">
                                   <input type="submit" value="Update" class="btn btn-primary btn-md float-right" />
                               </div>
                           </div>
                       </div>

                   </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection