<?php

spl_autoload_register(static function ($class) {
  $path = __DIR__ . '/../src/' . lcfirst(str_replace('\\', '/',
      $class)) . '.php';
  if (file_exists($path)) {
    require $path;
  }
});

use App\Controllers\HomeController;

$greeting = new HomeController();
$greeting->sayHello('Raul');
