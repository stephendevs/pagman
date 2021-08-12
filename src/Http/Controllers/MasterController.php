<?php

namespace Stephendevs\Lpage\Http\Controllers;

use Stephendevs\Lpage\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;

use Stephendevs\Lpage\Models\Page\Page;

class MasterController extends Controller
{
    

    public function index()
    {

        $pages = config('pacoss.pages');
    return view('lpage::index', compact(['pages']));
    }

    public function syncSplPages()
    {
        $splpages = (filled(config('lpage.splpages', []))) ? config('lpage.splpages', []) : [];
        if (count($splpages)) {
           for ($i=0; $i < count($splpages); $i++) {
               return url($splpages[$i]['route']);
           }
        }else{
            return 'spl pages not defined';
        }


        return $splpages;
    }
}
