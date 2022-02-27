<?php
declare(strict_types = 1);

namespace App\Controllers;

use PDO;
class HomeController {

  public function dbConnect() {
    try {
      $db = new PDO('mysql:host=db;dbname=project', 'project', 'project');
    } catch (\PDOException $e) {
      throw new \PDOException($e->getMessage(), $e->getCode());
    }

    echo "Connection to DB was established";
  }

  public function sayHello(string $name): void {
    echo "Hello $name";
  }
}