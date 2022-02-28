<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use App\Controllers\HomeController;

$dbHandler = new HomeController();
$dbHandler->dbConnect();

