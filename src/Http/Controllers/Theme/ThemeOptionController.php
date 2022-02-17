<?php

namespace Stephendevs\Pagman\Http\Controllers\Theme;

use Stephendevs\Pagman\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ThemeOptionController extends Controller
{

    public function index()
    {
        return view(config('pagman.theme').'::dashboard.options.index');
    }


}
