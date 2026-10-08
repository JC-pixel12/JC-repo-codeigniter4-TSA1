<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{
    public function index()
    {
        $UsersModel = new UsersModel();
        $users['users'] = $UsersModel->findAll();
        return view('users', $users);
    }
}