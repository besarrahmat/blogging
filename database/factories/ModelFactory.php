<?php

$factory->define(User::class, function (Faker\Generator $faker) {
    
return [
    'penulis' => $faker->penulis,
    'judul' => $faker->judul,
    'isi' => $faker->isi
    ];
});