<?php

return [
    /*
    |--------------------------------------------------------------------------
    | URL Customization -- dashboard | admin-panel | secrete
    |--------------------------------------------------------------------------
    | The value is the route prefix for access the dashboard
    | By default the vale is dashboard
    | lad dashboard is access via https:example.com/dashboard
    */
    'route_prefix' => 'dashboard',

    /*
    |--------------------------------------------------------------------------
    | Middlewares  
    |--------------------------------------------------------------------------
    | The value is the array of additional middlewares to further protect dashboard
    */
    'middlewares' => ['web'],

     /*
    |--------------------------------------------------------------------------
    | Home Blade  
    |--------------------------------------------------------------------------
    */
    'home' => 'pagman::index',

    /*
    |--------------------------------------------------------------------------
    | Storage Directory
    |--------------------------------------------------------------------------
    | The directory inside lavavel storage folder where the application media file will be stored.
    | By default Lad stores in the media folder. -- Uncomment to customize
    */
    //'storage_dir' => 'media',
    
    /*
    |--------------------------------------------------------------------------
    | Authentication Guard
    |--------------------------------------------------------------------------
    | Wow, In regard to laravel authentication guard configuration. The value for auth_guard depends
    | on the admin guard and provider defined in auth config file.

    | If your guard provider is not same as the table name where admins are stored then set the auth_table
    */
    'auth_guard' => 'admin',
    //'auth_table' => 'fucks',


   /*
  |--------------------------------------------------------------------------
  | Admin Permissions (Uses the permission middleware) --> $this->middleware('permission:manage_users')
  |--------------------------------------------------------------------------
  */
  'permissions' => [
    'view_users' => 'Ability to view user account listing ... Admins and other user accounts',
    'delete_users' => 'Ability to delete user accounts ....',
    'edit_users' => 'Ability to edit user accounts ....',
    'create_users' => 'Adds or creates user accounts ... Like admins accounts',
    'manage_user_permissions' => 'Manages user permissions',

    'cmd' => 'Access to command interface to run artisan commands.',
    'configure_system_settings' => 'Configure system settings, like Mail Servers, Enable System Caching etc',
    'manage_mail_servers' => 'Manage Mail Servers',

],


   /*
  |--------------------------------------------------------------------------
  | Other package links 
  | Blades holding nav-item for sidebar
  |--------------------------------------------------------------------------
  */
  'sidebar_navitems' => [
    'pagman::lad.sidebar.posts',
    'pagman::lad.sidebar.appearance',
    'pagman::lad.sidebar.pages',
  ],


];