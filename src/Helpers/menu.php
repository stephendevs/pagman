<?php
use Stephendevs\Pagman\Models\Menu\Menu;

if(!function_exists('menu')){

    function menu($location)
    {
        return $menu = Menu::findMenuItems($location)->first();
    }
}
