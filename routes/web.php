<?php

use Illuminate\Support\Facades\Route;

use Stephendevs\Lpage\Http\Controllers\MasterController;
use Stephendevs\Lpage\Http\Controllers\Page\PageController;

use Stephendevs\Lpage\Http\Controllers\Menu\MenuController;



Route::middleware(config('lpage.middlewares', 'web'))->group(function () {

    Route::prefix(config('lpage.dashboard_route_prefix', 'pagemanager'))->group(function(){
        
        Route::get('/', [MasterController::class, 'index'])->name('lpageManager');

        Route::get('/menus', [MenuController::class, 'index'])->name('lpageMenus');
        Route::get('/menus/ajax', [MenuController::class, 'indexAjax'])->name('lpageMenusAjax');
        Route::get('/menu/create', [MenuController::class, 'index'])->name('lpageMenuCreate');
        Route::post('/menu/create', [MenuController::class, 'store'])->name('lpageMenuStore');
        Route::get('/menu/show/{id}', [MenuController::class, 'show'])->name('lpageMenuShow');
        Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('lpageMenuEdit');
        Route::post('/menu/update/{id}', [MenuController::class, 'update'])->name('lpageMenuUpdate');
        Route::get('/menu/delete/{id}', [MenuController::class, 'destroy'])->name('lpageMenuDestroy');

        Route::get('/pages/menu', [PageController::class, 'menu']);
        Route::get('/pages', [PageController::class, 'index'])->name('lpagePages');
        Route::get('/page/create', [PageController::class, 'create'])->name('lpagePageCreate');
        Route::post('/page/store', [PageController::class, 'store'])->name('lpagePageStore');
        Route::get('/page/show/{id}', [PageController::class, 'show'])->name('lpagePageShow');
        Route::get('/page/edit/{id}', [PageController::class, 'edit'])->name('lpagePageEdit');
        Route::post('/page/update/{id}', [PageController::class, 'update'])->name('lpagePageUpdate');
        Route::get('/page/delete/{id}', [PageController::class, 'destroy'])->name('lpagePageDestroy');



        Route::get('/navigation/menu/create', [NavbarMenuController::class, 'create'])->name('lpageNavbarMenuCreate');
        Route::post('/navigation/menu/create', [NavbarMenuController::class, 'store']);
        Route::get('/navigation/menu/show/{id}', [NavbarMenuController::class, 'show'])->name('lpageNavbarMenu');
        Route::get('/navigation/menu/edit/{id}', [NavbarMenuController::class, 'edit'])->name('lpageNavbarMenuEdit');
        Route::post('/navigation/menu/edit/{id}', [NavbarMenuController::class, 'update']);
        Route::get('/navigation/menu/delete/{id}', [NavbarMenuController::class, 'destroy'])->name('lpageNavbarMenuDestroy');




    });

});