<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use JetBrains\PhpStorm\Pure;
use PDO;

class HomeController
{

    #[Pure]
    public static function index(): View
    {
        return View::make('index');
    }

    public function sayHello(string $name): void
    {
        echo "Hello $name";
    }

}