<?php

namespace Stephendevs\Pagman\Http\Controllers;

use Stephendevs\Pagman\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;

use Stephendevs\Pagman\Models\Page\Page;

use Stephendevs\Pagman\Models\Menu\Menu;
use Stephendevs\Pagman\Models\Menu\MenuItem;

class MasterController extends Controller
{
    

    public function index()
    {
        //return Menu::all();
        return view('pagman::index');
    }

    public function syncMenuItems()
    {
        //find main menu
        $menu = Menu::findMenu('name', config('web.main_menu', 'main'))->first();

        

        //get menuitems from config
        $menuitems = config('web.menu_items', []);

        if(count($menuitems)){
            foreach($menuitems as $index => $value){
                MenuItem::firstOrCreate([
                    'name' => $index,
                    'url' => url($value),
                    'menu_id' => $menu->id
                ]);
            }
        }else{
            //no menu items to syn
        }
        return back();
    }

}
