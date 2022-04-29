<?php

namespace Stephendevs\Pagman\Http\Controllers\Theme;

use Stephendevs\Pagman\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stephendevs\Lad\Traits\UpdatesOrCreatesOptions;


class ThemeOptionController extends Controller
{
    use UpdatesOrCreatesOptions { 
        updateOrCreate as store;
    }

    public function index()
    {
        $options =  $this->getOptions();
        return view(config('pagman.theme').'::dashboard.options.index', compact(['options']));
    }

    protected function options() : array 
    {
        
        $theme = theme();
        return config($theme.'.options', []);
    }

    protected function rules()
    {
        $theme = config('pagman.theme', 'aamsnm');
        return config($theme.'.option_rules', []);
    }


}
