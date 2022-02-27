<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;

$dbHandler = new HomeController();
$dbHandler->dbConnect();
