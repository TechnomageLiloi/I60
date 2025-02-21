<?php

namespace Liloi\I60;

include_once __DIR__ . '/RuneFramework.phar';
include_once __DIR__ . '/Application.php';

$app = new Application([
    'title' => 'Interstate 60',
    'start' => 'Requests.layout();',
    'scripts' => [
        '/Requests.js'
    ],
    'connection' => json_decode(file_get_contents('./Database.json'), true),
    'prefix' => 'i60_'
]);

echo $app->compile();