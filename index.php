<?php

namespace Liloi\I60;

include_once __DIR__ . '/RuneFramework.phar';
include_once __DIR__ . '/Application.php';

$private = json_decode(file_get_contents('./Config/Private.json'), true);

$config = array_merge([
    'title' => 'Interstate 60',
    'start' => 'Requests.layout();',
    'scripts' => [
        $private['root'] . '/Requests.js',
        $private['root'] . '/API/Tickets/Requests.js',
    ],
    'prefix' => 'i60_'
], $private);

$app = new Application($config);

echo $app->compile();