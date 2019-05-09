<?php
declare(strict_types=1);

/* @var Factory $factory */

use App\Product;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'user_id' => User::inRandomOrder()->first()->id,
        'active' => rand(0,1),
        'name' => $faker->unique()->firstName,
        'description' => $faker->text('16000'),
        'price' => 100000.00,
    ];
});
