<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Route prefix for accessing the admin panel for pagman -- default dashboard/pagman
    |--------------------------------------------------------------------------
    */
    'route_prefix' => 'dashboard',

     /*
    |--------------------------------------------------------------------------
    | The middlewares that protect access to the pagman dashboard.
    | By default it uses web, and auth:admin
    | The auth:admin is asumed you use the lad dashboard package
    |
    | 'middlewares' => ['web', 'auth:admin'],
    |--------------------------------------------------------------------------
    */
    'middlewares' => ['web', 'auth'],

    /*
    |--------------------------------------------------------------------------
    | If set to true pagman will cashed the page contents, nav menu to boots the application
    | Its recommended to keep this true
    |--------------------------------------------------------------------------
    */
    'enable_caching' => true,
    
    /*
    |--------------------------------------------------------------------------
    | The layout to be extended for the pagman dashboard.
    | The layout must have the sections ---- title, content
    |--------------------------------------------------------------------------
    */
    'layout' => 'lad::core.layouts.master',

    /*
    |--------------------------------------------------------------------------
    | The website template or theme that pagman will manage its content
    | The template_type_modular determines if the template is basic or in modular format
    | The template_type_modular by default is asured to be modular --> true.
    |--------------------------------------------------------------------------
    */
    'theme' => env('PAGMAN_THEME', ''),
    

    'template_type_modular' => true,

    /*
    |--------------------------------------------------------------------------
    | The template config file holding the pages to be included in menu
    |--------------------------------------------------------------------------
    */
    'template_config' => '',

     /*
    |--------------------------------------------------------------------------
    | Lad Integration Config Values -- add this arrays to lad base config file
    | sidebar_items
    |--------------------------------------------------------------------------
    */
    'sidebar_navitems' => [
        'pagman::lad.sidebar.posts',
        'pagman::lad.sidebar.pages',
        'pagman::lad.sidebar.appearance',
    ],
    

    'users_sidebar_items' => [
        //'pagman::lad.sidebar.users'
    ],

    'settings_sidebar_items' => [
        //'pagman::lad.sidebar.settings'
    ],


    'user_table' => 'admins',
    'user_model' => 'Stephendevs\Lad\Models\Admin\Admin',


    'standard_post_types' => [
    ],

    'post_types' => [
        [ 'customurl', 'pagman::core.includes.posttypeviews.customurl']
    ]



];