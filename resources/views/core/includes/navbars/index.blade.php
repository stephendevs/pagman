@extends(config('lpage.master_layout', 'lpage::core.layouts.master'))

@section('content')
    <div class="row">
        <div class="col-lg-8">
            @if (count($navbars))
               <ol>
                 @foreach ($navbars as $navbar)
                    <li>
                        <div style="font-size: 20px; font-weight: 900; text-transform: capitalize;"><span>{{ $navbar->name.' navbar' }}</span></div>
                        <div>
                            <ul>
                                <li style="font-weight: 900">{{ $navbar->name.' navbar menus' }}</li>
                                @if (count($navbar->menus))
                                    @foreach ($navbar->menus as $menu)
                                        <li>
                                            {{ $menu->name }} 
                                            <span class="text-danger">{{ ($menu->active) ? __('active') : __('') }}</span>
                                            <span class="badge badge-danger">{{ $menu->pages_count }}</span>
                                        </li>
                                    @endforeach
                                @else
                                            
                                @endif
                            </ul>
                        </div>
                    </li>
                @endforeach
                </ol>
            @else
                <div>
                    <p>no navbars</p>
                    <a href="">create</a>
                </div>
            @endif
        </div>
    </div>
@endsection