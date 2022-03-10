<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\RouteNotFoundException;
use PDO;

class App
{

    private static DB $db;

    public function __construct(
      protected Router $router,
      protected array $request,
      protected Config $config
    ) {
        static::$db = new DB($config->db ?? []);
    }

    public static function db(): DB
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