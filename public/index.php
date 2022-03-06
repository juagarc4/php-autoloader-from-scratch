<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$router = new App\Router();
$router->register('/', [App\Controllers\HomeController::class, 'index']);
$router->register('/users', [App\Controllers\UsersController::class, 'index']);

echo $router->resolve($_SERVER['REQUEST_URI']);