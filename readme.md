[![](https://raw.githubusercontent.com/stephendevs/stephendevs/main/pagman/lcms.jpg)](ttps://www.linkedin.com/in/stephendev)

<h1><span style="color:#FFd;border:1px solid white;padding:5px;border-radius:10px;">Laravel</span> <span style="color:yellow;">CMS</span>  <span style="color:red;">Package</span></h1>

---


### Installation
Using Composer On fresh laravel project run `composer require stephendevs/pagman`
```php
composer require stephendevs/pagman
```
Check if `lad` has been included by running `composer show stephendevs/lad` If `lad` is included run the command `php artisan lad:install` to set it up. For a fresh install of `lad` run `php artisan lad:install --fresh`
```php
composer show stephendevs/lad
php artisan lad:install
```
### Publish Assets & Configs

```php
php artisan vendor:publish --tag=pagman-assets --force
php artisan vendor:publish --tag=pagman-config --force
```

### Database Migration & Default Admin User Creation.
With proper DB Configurations run `php artisan migrate` to the migrate you Database Tables & Create default admin user `php artisan create:admin --default`
```php
php artisan migrate
php artisan create:admin --default
```

---
<p><i>Still confused on how to develop laravel CSM (Pagman) website theme (Template) , Click
<a href="https://github.com/stephendevs/pagmanbasicthemedevelopment">here</a>
to get started</i><p>