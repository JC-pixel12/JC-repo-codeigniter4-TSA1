<?php 

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $users = [
            [
                'username' => 'admin',
                'full_name' => 'John Administrator',
                'role' => 'Administrator'
            ],
            [
                'username' => 'cashier1',
                'full_name' => 'Sarah Cruz',
                'role' => 'Cashier'
            ],
            [
                'username' => 'cashier2',
                'full_name' => 'Michael Santos',
                'role' => 'Cashier'
            ],
            [
                'username' => 'manager1',
                'full_name' => 'David Reyes',
                'role' => 'Manager'
            ],
            [
                'username' => 'staff1',
                'full_name' => 'Emily Garcia',
                'role' => 'Staff'
            ]
        ];

        return view('users', ['users' => $users]);
    }
}