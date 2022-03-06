<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

const VIEW_PATH = __DIR__ . '/../src/app/Views';

$router = new App\Router();
$router->get('/', [App\Controllers\HomeController::class, 'index']);
$router->get('/users', [App\Controllers\UsersController::class, 'index']);
$router->get(
  '/users/create',
  [App\Controllers\UsersController::class, 'create']
);
$router->post(
  '/users/create',
  [App\Controllers\UsersController::class, 'save']
);

echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);