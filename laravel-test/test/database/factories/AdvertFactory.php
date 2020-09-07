<?php

/** @var Factory $factory */

use App\Entity\Advert;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Advert::class, function (Faker $faker) {

    $fakeImagesJson = json_encode([
        $faker->imageUrl(),
        $faker->imageUrl(),
        $faker->imageUrl()
    ]);

    return [
        'advert_name' => $faker->sentence(4),
        'advert_description' => $faker->paragraph,
        'advert_images' => $fakeImagesJson,
        'advert_price' => $faker->randomFloat(),
    ];
});
