[![](https://raw.githubusercontent.com/stephendevs/stephendevs/main/pagman/lcms.jpg)](ttps://www.linkedin.com/in/stephendev)

<h1><span style="color:#FFd;border:1px solid white;padding:5px;border-radius:10px;">Laravel</span> <span style="color:yellow;">CMS</span>  <span style="color:red;">Package</span></h1>

---


### Installation
```php
#1 Using Composer On fresh laravel project
```
```php
require stephendevs/pagman
```
```php
#2 Add PagmanServiceProvider on the package service provides array in app config file.
```
```php
'providers' => [
    /*
     * Package Service Providers...
     */
    Stephendevs\Pagman\Providers\PagmanServiceProvider::class,
],
```

### Configuration


```php
#1. Configure your .env file to use correct database info
```
```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pagman
DB_USERNAME=root
DB_PASSWORD=
```

```php
#2 Migrate Database Tables, Create Admin User -- Run the commands below
```
```php
php artisan migrate
php artisan create:admin --super --default
```

### Publish Assets, Configs & Views

```php
php artisan vendor:publish --tag=pagman-assets --force
php artisan vendor:publish --tag=pagman-config --force
php artisan vendor:publish --tag=pagman-views --force
```

### Artisan Commands
```php
php artisan options:cache
php artisan defaultcategories:cache
```


<p><i>Still confused on how to develop laravel CSM (Pagman) website theme , Click
<a href="https://github.com/stephendevs/pagmanbasicthemedevelopment">here</a>
to get started</i><p>