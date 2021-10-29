<?php

use fw\core\Router;

$query = rtrim($_SERVER['QUERY_STRING'], '/');

define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');
define('DB', dirname(__DIR__) . '/Db');

require '../vendor/fw/core/functions.php';
require __DIR__ . '/../vendor/autoload.php';

new \fw\core\App;

Router::add('^page/(?P<action>[a-z0-9-]+)/(?P<alias>[a-z0-9-]+)$', ['controller' => 'Page']);
Router::add('^page/(?P<alias>[a-z0-9-]+)$', ['controller' => 'Page', 'action' => 'view']);

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z0-9-]+)/?(?P<action>[a-z0-9-]+)?$');


Router::dispatch($query);