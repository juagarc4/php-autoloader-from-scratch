<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\RouteNotFoundException;
use PDO;

class App
{

    private static PDO $db;

    public function __construct(
      protected Router $router,
      protected array $request
    ) {
        try {
            static::$db = new PDO(
              'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'],
              $_ENV['DB_USER'],
              $_ENV['DB_PASSWORD']
            );
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), $e->getCode());
        }
    }

    public static function db(): PDO
    {
        return static::$db;
    }

    public function run(): void
    {
        try {
            echo $this->router->resolve(
              $this->request['uri'],
              $this->request['method']
            );
        } catch (RouteNotFoundException) {
            http_response_code(404);
            echo View::make('errors/404');
        }
    }

}