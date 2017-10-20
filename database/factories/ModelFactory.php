<?php

//$factory->define('App\Models\Restrito\Artigos', function (Faker\Generator $faker) {
//    return [
//        'ART_TITULO' => $faker->sentence,
//        'ART_TEXTO' => $faker->text(500),
//    ];
//});

$factory->define('App\Models\Restrito\Posts', function (Faker\Generator $faker) {
    return [
        'SUBCAT_CODIGO' => $faker->randomElement($array = array(4, 5)),
        'POS_CODIGO' => 1,
        'user_id' => 2,
        'POST_RETRANCA' => $faker->word,
        'POST_TITULO' => $faker->sentence,
        'POST_SUBTITULO' => $faker->sentence,
        'POST_SLUG' => $faker->slug,
        'POST_TEXTO' => $faker->text(600),
        'POST_TAGS' => $faker->word,
        'POST_TAGS_URL' => $faker->word,
        'POST_STATUS' => 'ATIVO',
        'POST_IMAGE' => '',
        'POST_DTINICIO' => date('Y-m-d'),
        'POST_RESSTRITAAOSUSUARIOS' => 'NÃO',
    ];
});