<?php

namespace Liloi\I60;

include_once __DIR__ . '/RuneFramework.phar';
include_once __DIR__ . '/Application.php';

$app = new Application([
    'title' => 'Interstate 60',
    'start' => 'Requests.layout();',
    'scripts' => [
        '/Requests.js'
    ]
]);

echo $app->compile();