<?php

$factory->define('App\Models\Restrito\Posts', function (Faker\Generator $faker) {
    return [
        'SUBCAT_CODIGO' => $faker->randomElement($array = array(1, 2)),
        'user_id' => 1,
        'POST_RETRANCA' => $faker->word,
        'POST_TITULO' => $faker->sentence,
        'POST_SUBTITULO' => $faker->sentence,
        'POST_SLUG' => $faker->slug,
        'POST_TEXTO' => $faker->text(600),
        'POST_TAGS' => $faker->word,
        'POST_TAGS_URL' => $faker->word,
        'POST_STATUS' => 'ATIVO',
        'POST_IMAGE' => '',
        'POST_IMAGE_CREDITO' => '',
        'POST_IMAGE_LEGENDA' => '',
        'POST_VIDEO' => '',
    ];
});