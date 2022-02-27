<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;

$greeting = new HomeController();
$greeting->sayHello('Raul');
