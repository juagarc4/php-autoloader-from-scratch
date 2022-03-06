<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use JetBrains\PhpStorm\Pure;

class UsersController
{

    #[Pure]
    public function index(): View
    {
        return View::make('users/index', ['users' => 'users here']);
    }

    #[Pure]
    public function create(): View
    {
        return View::make('users/create');
    }

    public function save(): void
    {
        $userName = $_POST['user_name'];
        $userPassword = $_POST['user_password'];

        var_dump($userName, $userPassword);
    }

}