<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Route prefix for accessing the schoollarizer administration dashboard
    ! By default this is set to dashboard -- but you can set it here
    |--------------------------------------------------------------------------
    */
    'master_layout' => 'ldashboard::core.layouts.master',
    'route_prefix' => 'dashboard/pagemanager',

    'dashboard_route_prefix' => 'dashboard/pagemanager',

    'middlewares' => ['web', 'auth:ldashboardadmin'],



    'pages' => [
        ['name' => 'About', 'route' => '/about-us']
    ],



];