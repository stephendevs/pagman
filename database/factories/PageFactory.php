<?php

use Faker\Generator as Faker;

$factory->define(\Stephendevs\Lpage\Models\Page\Page::class, function (Faker $faker) {
    return [
        'name' => 'home',
        'title' => 'home',
        'slug' => 'home',
        'url' => 'http://127.0.0.1:8000/',
    ];
});
