<?php

use Illuminate\Support\Facades\Route;

use Stephendevs\Pagman\Http\Controllers\TestController;
use Stephendevs\Pagman\Http\Controllers\MasterController;
use Stephendevs\Pagman\Http\Controllers\Page\PageController;
use Stephendevs\Pagman\Http\Controllers\Post\PostTypeViewController;

use Stephendevs\Pagman\Http\Controllers\Menu\MenuController;
use Stephendevs\Pagman\Http\Controllers\Menu\MenuItemController;

use Stephendevs\Pagman\Http\Controllers\Settings\SettingsController;

use Stephendevs\Pagman\Http\Controllers\Post\PostController;
use Stephendevs\Pagman\Http\Controllers\Post\PostMediaController;
use Stephendevs\Pagman\Http\Controllers\Media\MediaController;
use Stephendevs\Pagman\Http\Controllers\Category\CategoryController;

use Stephendevs\Pagman\Http\Controllers\Theme\ThemeOptionController;
use Stephendevs\Pagman\Http\Controllers\Theme\ThemeCustomizationController;



Route::middleware(config('pagman.middlewares', 'web'))->group(function () {

    Route::prefix(config('pagman.route_prefix', 'dashboard'))->group(function(){
        
        Route::get('/sync/menuitems', [MasterController::class, 'syncMenuItems'])->name('pagman.syn.menuitems');


        Route::get('/menus', [MenuController::class, 'index'])->name('pagman.menus');

        Route::post('/menu/create', [MenuController::class, 'store'])->name('pagman.menus.store');
        Route::get('/menus/{id}', [MenuController::class, 'show'])->name('pagman.menus.show');

        Route::post('/menuitem/create/{id}', [MenuItemController::class, 'store'])->name('pagman.menuitem.create');
        Route::get('/menuitem/delete/{id}', [MenuItemController::class, 'destroy'])->name('pagman.menuitem.destroy');

        //Route::get('/themes', [MenuController::class, 'show'])->name('pagman.themes');
        //Route::get('/theme/{name}', [MenuController::class, 'show'])->name('pagman.theme');
       // Route::get('/theme/{name}/customize', [MenuController::class, 'show'])->name('pagman.theme.customize');

        Route::get('/menus/menuitem/remove/{pivot_id}', [MenuItemController::class, 'remove'])->name('pagman.menus.menuitem.remove');

        Route::get('/menus/ajax', [MenuController::class, 'indexAjax'])->name('lpageMenusAjax');
        Route::get('/menu/create', [MenuController::class, 'index'])->name('lpageMenuCreate');
        Route::get('/menu/show/{id}', [MenuController::class, 'show'])->name('lpageMenuShow');
        Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('lpageMenuEdit');
        Route::post('/menu/update/{id}', [MenuController::class, 'update'])->name('lpageMenuUpdate');
        Route::get('/menu/delete/{id}', [MenuController::class, 'destroy'])->name('lpageMenuDestroy');

        Route::get('/pages/menu', [PageController::class, 'menu']);
        Route::get('/pages', [PageController::class, 'index'])->name('pagman.pages');

        Route::get('/pages/create', [PageController::class, 'create'])->name('pagman.pages.create');
        Route::post('/pages/store', [PageController::class, 'store'])->name('pagman.pages.store');
        Route::get('/pages/show/{id}', [PageController::class, 'show'])->name('pagman.pages.show');
        Route::get('/pages/edit/{id}', [PageController::class, 'edit'])->name('pagman.pages.edit');
        Route::post('/pages/update/{id}', [PageController::class, 'update'])->name('pagman.pages.update');
        Route::get('/pages/delete/{id}', [PageController::class, 'destroy'])->name('pagman.pages.destroy');

        Route::get('/settings', [SettingController::class, 'index'])->name('pagmanSettings');

        Route::get('/test', [TestController::class, 'index'])->name('test');

        Route::get('/posts', [PostController::class, 'index'])->name('pagman.posts');
        Route::get('/posts/create', [PostController::class, 'create'])->name('pagman.posts.create');
        Route::post('/posts/create', [PostController::class, 'store'])->name('pagman.posts.store');
        Route::get('/posts/show/{id}', [PostController::class, 'show'])->name('pagman.posts.show');
        Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('pagman.posts.edit');
        Route::post('/posts/edit/{id}', [PostController::class, 'update'])->name('pagman.posts.update');
        Route::get('/posts/trash/{id}', [PostController::class, 'destroy'])->name('pagman.posts.destroy');

        Route::post('/posts/search', [PostController::class, 'search'])->name('pagman.posts.search');

        Route::get('/posts/media/add/{media_id}/{post_id}', [PostMediaController::class, 'add'])->name('pagman.posts.media.add');



        Route::get('/posts/posttype/{posttype?}', [PostController::class, 'index'])->name('pagman.posts.posttype');
        Route::get('/posts/posttype/{posttype?}/create', [PostController::class, 'create'])->name('pagman.posts.posttype.create');
        Route::get('/posts/show/{id}/posttype/{posttype?}', [PostController::class, 'show'])->name('pagman.posts.posttype.show');
        Route::get('/posts/edit/{id}/posttype/{posttype?}', [PostController::class, 'edit'])->name('pagman.posts.posttype.edit');

        

        Route::get('/poststype/view/{view}', [PostTypeViewController::class, 'index'])->name('pagman.posttypeview');

        Route::view('/bootsrapmenuitems', 'pagman::web.menu.bootstrapmenuitems');

        Route::get('/theme/options', [ThemeOptionController::class, 'index'])->name('pagman.theme.options')->middleware(['auth']);
        Route::post('/theme/options', [ThemeOptionController::class, 'store'])->name('pagman.theme.options.update');

        Route::get('/customize', [ThemeCustomizationController::class, 'index'])->name('pagman.theme.customize');

        Route::get('/cms/settings', [SettingsController::class, 'index'])->name('pagman.settings');
        Route::post('/cms/settings', [SettingsController::class, 'store'])->name('pagman.settings.update');

        Route::get('/media', [MediaController::class, 'index'])->name('pagman.media');
        Route::get('/media/create', [MediaController::class, 'create'])->name('pagman.media.create');
        Route::post('/media/store', [MediaController::class, 'store'])->name('pagman.media.store');
        Route::post('/media/update/{id}', [MediaController::class, 'update'])->name('pagman.media.update');
        Route::get('/media/show/{id}', [MediaController::class, 'show'])->name('pagman.media.show');
        Route::get('/media/destroy/{id}', [MediaController::class, 'destroy'])->name('pagman.media.destroy');

        Route::get('/categories', [CategoryController::class, 'index'])->name('pagman.categories');
        Route::post('/categories/store', [CategoryController::class, 'store'])->name('pagman.categories.store');
        Route::get('/destroy/{id}', [CategoryController::class, 'destroy'])->name('pagman.categories.destroy');


    });

});