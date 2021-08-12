<?php

use Faker\Generator as Faker;

$factory->define(\Stephendevs\Lpage\Models\Menu\Menu::class, function (Faker $faker) {
    return [
        'name' => 'Main Menu',
        'is_primary' => '1',
        'footer' => '1'
    ];
});
