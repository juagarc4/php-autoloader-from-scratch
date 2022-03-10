<?php

namespace App;

use PDO;

/**
 * @mixin PDO
 */
class DB
{

    private PDO $pdo;

    public function __construct(array $config)
    {
        $defaultOptions = [
          PDO::ATTR_EMULATE_PREPARES => false,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        try {
            $this->pdo = new PDO(
              $config['driver'] . ':host=' . $config['host'] . ';dbname=' . $config['database'],
              $config['user'],
              $config['pass'],
              $config['options'] ?? $defaultOptions
            );
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), $e->getCode());
        }
    }

    // If we call a method that does not exist here, it will call
    // the method of PDO. It works as a proxy between our app and PDO.
    public function __call(string $name, array $arguments = [])
    {
        if (empty($arguments)) {
            return call_user_func([$this->pdo, $name]);
        } else {
            return call_user_func([$this->pdo, $name], $arguments);
        }
    }

    // a helper function to run prepared statements smoothly
    public function run($sql, $args = []): bool|\PDOStatement
    {
        if (!$args) {
            return $this->pdo->query($sql);
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

}