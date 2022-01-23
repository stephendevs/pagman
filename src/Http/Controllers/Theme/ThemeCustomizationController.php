<?php

namespace Stephendevs\Pagman\Http\Controllers\Theme;

use Stephendevs\Pagman\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ThemeCustomizationController extends Controller
{
    public function index()
    {
        return view(config('web.theme_customize_view', 'pagman::theme.customize.index'));
    }


}
