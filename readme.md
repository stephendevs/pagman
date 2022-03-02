[![](https://raw.githubusercontent.com/stephendevs/stephendevs/main/media/pagman/banner.png)](ttps://www.linkedin.com/in/stephendev)

# Pagman 👋.

Laravel CMS Package

---


### Installation
###### Using Composer On fresh laravel project.

```php
require stephendevs/pagman
```
###### Add PagmanServiceProvider on the package service provides array in app config file.

```php
'providers' => [
    /*
     * Package Service Providers...
     */
    Stephendevs\Pagman\Providers\PagmanServiceProvider::class,
],
```
<hr />

### Configuration

###### Configure your .env file to use correct database info

```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pagman
DB_USERNAME=root
DB_PASSWORD=
```


###### Migrate Database Tables

```php
 php artisan migrate
```

###### Create Admin User.

```php
php artisan create:admin --super --default
```

---

### Publish Assets, Configs & Views

###### Assets
```php
php artisan vendor:publish --tag=pagman-assets --force
```
###### Configs

```php
php artisan vendor:publish --tag=pagman-config --force
```

###### Views
```php
php artisan vendor:publish --tag=pagman-views --force
```