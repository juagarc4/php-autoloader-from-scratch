<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\RouteNotFoundException;

class Router {

  private array $routes = [];

  public function get(string $route, callable|array $action): self {
    $this->register('GET', $route, $action);
    return $this;
  }

  public function register(
    string $requestMethod,
    string $route,
    callable|array $action
  ): self {
    $this->routes[$requestMethod][$route] = $action;
    return $this;
  }

  public function post(string $route, callable|array $action): self {
    $this->register('POST', $route, $action);
    return $this;
  }

  public function routes(): array {
    return $this->routes;
  }

  /**
   * @throws \App\Exceptions\RouteNotFoundException
   */
  public function resolve(string $requestUri, string $requestMetod) {
    $route = explode('?', $requestUri)[0];
    $action = $this->routes[$requestMetod][$route] ?? NULL;

    if (!$action) {
      throw new RouteNotFoundException();
    }

    if (is_callable($action)) {
      return $action();
    }

    if (is_array($action)) {
      [$class, $method] = $action;
      if (class_exists($class)) {
        $class = new $class;
        if (method_exists($class, $method)) {
          return $class->$method([]);
        }
      }
    }
    throw new RouteNotFoundException();
  }

}