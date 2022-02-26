<?php

use App\Controllers\HomeController;

require_once "../src/app/Controllers/HomeController.php";

$greeting = new HomeController();
$greeting->sayHello('Raul');
