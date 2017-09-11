<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Auditoria\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'api_token' => str_random(10),
    ];
});

$factory->define(Auditoria\Enterprise::class, function (Faker\Generator $faker) {
    
    return [
        'nit' => $faker->ean8,
        'nombre' => $faker->name,
        'descripcion' => str_random(100),
        'direccion' => $faker->streetAddress,
        'user_id' => function(){
            return factory(Auditoria\User::class)->create()->id;
        }
    ];
});

$factory->define(Auditoria\ItemAudit::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
    ];
});

$factory->define(Auditoria\Auditor::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'role' => str_random(10),
    ];
});

