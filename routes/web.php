<?php

use Illuminate\Support\Facades\Route;

use Stephendevs\Pagman\Http\Controllers\TestController;
use Stephendevs\Pagman\Http\Controllers\MasterController;
use Stephendevs\Pagman\Http\Controllers\Page\PageController;
use Stephendevs\Pagman\Http\Controllers\Post\PostTypeViewController;

use Stephendevs\Pagman\Http\Controllers\Menu\MenuController;
use Stephendevs\Pagman\Http\Controllers\Menu\MenuItemController;

use Stephendevs\Pagman\Http\Controllers\Setting\SettingController;

use Stephendevs\Pagman\Http\Controllers\Post\PostController;



Route::middleware(config('pagman.middlewares', 'web'))->group(function () {

    Route::prefix(config('pagman.route_prefix', 'dashboard/theme'))->group(function(){
        
        Route::get('/', [MasterController::class, 'index'])->name('pagman');
        Route::get('/sync/menuitems', [MasterController::class, 'syncMenuItems'])->name('pagman.syn.menuitems');


        Route::get('/menus/{menu}', [MenuController::class, 'index'])->name('pagman.menus');
        Route::post('/menu/create', [MenuController::class, 'store'])->name('pagman.menus.store');
        Route::get('/menus/{name}', [MenuController::class, 'show'])->name('pagman.menus.show');

        Route::post('/menuitem/create/{id}', [MenuItemController::class, 'store'])->name('pagman.menuitem.create');
        Route::get('/menuitem/delete/{id}', [MenuItemController::class, 'destroy'])->name('pagman.menuitem.destroy');

        Route::get('/themes', [MenuController::class, 'show'])->name('pagman.themes');
        Route::get('/theme/{name}', [MenuController::class, 'show'])->name('pagman.theme');
        Route::get('/theme/{name}/customize', [MenuController::class, 'show'])->name('pagman.theme.customize');

        Route::get('/menus/menuitem/remove/{pivot_id}', [MenuItemController::class, 'remove'])->name('pagman.menus.menuitem.remove');

        Route::get('/menus/ajax', [MenuController::class, 'indexAjax'])->name('lpageMenusAjax');
        Route::get('/menu/create', [MenuController::class, 'index'])->name('lpageMenuCreate');
        Route::get('/menu/show/{id}', [MenuController::class, 'show'])->name('lpageMenuShow');
        Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('lpageMenuEdit');
        Route::post('/menu/update/{id}', [MenuController::class, 'update'])->name('lpageMenuUpdate');
        Route::get('/menu/delete/{id}', [MenuController::class, 'destroy'])->name('lpageMenuDestroy');

        Route::get('/pages/menu', [PageController::class, 'menu']);
        Route::get('/pages', [PageController::class, 'index'])->name('pagmanPages');
        Route::get('/page/create', [PageController::class, 'create'])->name('pagmanPageCreate');
        Route::post('/page/store', [PageController::class, 'store'])->name('pagmanPageStore');
        Route::get('/page/show/{id}', [PageController::class, 'show'])->name('pagmanPageShow');
        Route::get('/page/edit/{id}', [PageController::class, 'edit'])->name('pagmanPageEdit');
        Route::post('/page/update/{id}', [PageController::class, 'update'])->name('pagmanPageUpdate');
        Route::get('/page/delete/{id}', [PageController::class, 'destroy'])->name('pagmanPageDestroy');

        Route::get('/settings', [SettingController::class, 'index'])->name('pagmanSettings');

        Route::get('/test', [TestController::class, 'index'])->name('test');

        Route::get('/posts', [PostController::class, 'index'])->name('pagman.posts');
        Route::get('/posts/posttype/{posttype?}', [PostController::class, 'index'])->name('pagman.posts.posttype');
        Route::get('/posts/create/{posttype?}', [PostController::class, 'create'])->name('pagman.posts.create');
        Route::post('/posts/create', [PostController::class, 'store'])->name('pagman.posts.store');
        Route::get('/posts/{id}', [PostController::class, 'edit'])->name('pagman.posts.show');
        Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('pagman.posts.edit');
        Route::post('/posts/edit/{id}', [PostController::class, 'update'])->name('pagman.posts.update');
        Route::get('/posts/trash/{id}', [PostController::class, 'destroy'])->name('pagman.posts.destroy');
        

        Route::get('/poststype/view/{view}', [PostTypeViewController::class, 'index'])->name('pagman.posttypeview');


        Route::view('/bootsrapmenuitems', 'pagman::web.menu.bootstrapmenuitems');


    });

});