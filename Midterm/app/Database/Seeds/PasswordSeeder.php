<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PasswordSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'username' => 'admin',
                'password' => 'admin123'
            ],
            [
                'username' => 'cashier1',
                'password' => 'cashier123'
            ],
            [
                'username' => 'cashier2',
                'password' => 'cashier123'
            ],
            [
                'username' => 'manager1',
                'password' => 'manager123'
            ],
            [
                'username' => 'staff1',
                'password' => 'staff123'
            ]
        ];

        foreach ($users as $user) {

            $hashedPassword = password_hash($user['password'],PASSWORD_DEFAULT);

            $this->db->table('users')->where('username', $user['username'])->update(['password' => $hashedPassword]);
        }
    }
}