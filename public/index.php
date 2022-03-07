<?php

use App\App;
use App\Router;
use App\Controllers\HomeController;
use App\Controllers\UsersController;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

const VIEW_PATH = __DIR__ . '/../src/app/Views';

$router = new Router();
$router->get('/', [HomeController::class, 'index'])
  ->get('/users', [UsersController::class, 'index'])
  ->get('/users/create', [UsersController::class, 'create'])
  ->post('/users/create', [UsersController::class, 'save']);


(new App(
  $router,
  [
    'uri' => $_SERVER['REQUEST_URI'],
    'method' => $_SERVER['REQUEST_METHOD']
  ]
))->run();