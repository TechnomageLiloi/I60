<?php

ini_set('display_errors', 'On');
session_start();
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
include_once __DIR__ . '/vendor/autoload.php';

$private = json_decode(file_get_contents(__DIR__ . '/Config/Private.json'), true);
define('ROOT_URL', $private['root']);
define('ROOT_PATH', __DIR__);

$config = array_merge([
    'title' => 'I60',
    'start' => 'Requests.layout();',
    'scripts' => [
    ],
    'prefix' => 'i60_'
], $private);

$app = new \Liloi\I60\Application($config);

echo $app->compile();