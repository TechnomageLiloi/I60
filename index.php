<?php

namespace Liloi\I60;

include_once __DIR__ . '/RuneFramework.phar';
include_once __DIR__ . '/Application.php';

$config = array_merge([
    'title' => 'Interstate 60',
    'start' => 'Requests.layout();',
    'scripts' => [
        '/Requests.js'
    ],
    'prefix' => 'i60_'
], json_decode(file_get_contents('./Config.json'), true));

$app = new Application($config);

echo $app->compile();