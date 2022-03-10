<?php

declare(strict_types=1);

namespace App\Controllers;

use App\App;
use App\Models\User;
use App\View;
use JetBrains\PhpStorm\Pure;

class UsersController
{

    #[Pure]
    public function index(): View
    {
        $userModel = new User();
        $users = $userModel->getAll();
        return View::make('users/index', ['users' => $users]);
    }

    #[Pure]
    public function create(): View
    {
        return View::make('users/create');
    }

    public function save(): View
    {
        $userName = $_POST['user_name'];
        $userPassword = $_POST['user_password'];

        $userModel = new User();
        $userId = $userModel->create($userName, $userPassword);
        $users = $userModel->getAll();

        return View::make('users/index', ['users' => $users]);
        //        return View::make('users/user', ['user' => $userModel->find($userId)]);
    }

}