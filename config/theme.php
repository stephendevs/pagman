<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Menu Locations --- Register Menu Locations
    |--------------------------------------------------------------------------
    */
    'main_menu' => 'header',
    'menu_locations' => ['header', 'footer'],


     /*
    |--------------------------------------------------------------------------
    | Add your default menu items
    | These will be added onto your default main_menu
    |--------------------------------------------------------------------------
    */
    'menu_items' => [
        'home' => '/',
        'about' => 'about',
        'contact' => '/contact-us'
    ],

     /*
    |--------------------------------------------------------------------------
    | Standard Post Types
    |--------------------------------------------------------------------------
    */
    'standard_post_types' => [
        'blog', 'news'
    ],

    'custom_post_types' => [
        'event' => 'aamsnm::dashboard.events'
    ],

    'post_types' => [
        'page', 'slider', 'custom_url', 'post', 'blog', 'event', 'download', 'social_link'
    ],

    

    'date_format' => '',
    
    'social_links' => [],

    'media_dir' => 'media',

    'pages' => '',

    'customization_view' => 'aamsnm::dashboard.customize.index',

];