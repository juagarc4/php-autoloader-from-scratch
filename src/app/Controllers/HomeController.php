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

    public function dbConnect(): string
    {
        try {
            $db = new PDO(
              'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'],
              $_ENV['DB_USER'],
              $_ENV['DB_PASSWORD']
            );
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), $e->getCode());
        }

        echo "<br>Connection to DB was established";
    }

    public function sayHello(string $name): void
    {
        echo "Hello $name";
    }

}