<?php

declare(strict_types=1);

namespace App\Controllers;

use PDO;

class HomeController
{

    public static function index(): string
    {
        return 'HOME';
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