<?php

namespace App\Controllers;

class UsersController
{

    public function index()
    {
        return "USERS";
    }

    public function create(): string
    {
        return '<form action="/users/create" method="post" name="form_user_create">
        <label>Username</label><input type="text" name="user_name"/>
        <label>Password</label><input type="password" name="user_password"/>
        <button>Save</button>
        </form>';
    }

    public function save(): void
    {
        $userName = $_POST['user_name'];
        $userPassword = $_POST['user_password'];

        var_dump($userName, $userPassword);
    }

}