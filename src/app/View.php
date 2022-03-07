<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\ViewNotFoundException;
use JetBrains\PhpStorm\Pure;

class View
{

    public function __construct(
      protected string $view,
      protected array $params = []
    ) {
    }

    #[Pure]
    public static function make(string $view, array $params = []): static
    {
        return new static($view, $params);
    }

    /**
     * @throws \App\Exceptions\ViewNotFoundException
     */
    public function __toString(): string
    {
        return $this->render();
    }

    /**
     * @throws \App\Exceptions\ViewNotFoundException
     */
    private function render(): string
    {
        $viewPath = VIEW_PATH . '/' . $this->view . '.php';
        if (!file_exists($viewPath)) {
            throw new ViewNotFoundException();
        }

        foreach ($this->params as $key => $value) {
            $$key = $value;
        }

        // Another option is to use:
        // extract($this->params, EXTR_OVERWRITE);
        // but it is 20%-80% slower

        ob_start();
        include $viewPath;

        return ob_get_clean();
    }

    public function __get(string $name)
    {
        return $this->params[$name] ?? null;
    }


}