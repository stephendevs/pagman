<?php
namespace Stephendevs\Pagman\Http\Composers;

use Illuminate\View\View;

class MenuItemsComposer
{
    public function compose(View $view)
    {
        $menu = menu('header');
        $view->with(compact(['menu']));
    }
}