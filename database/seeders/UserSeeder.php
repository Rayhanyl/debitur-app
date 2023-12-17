<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'superadmin',
                'email' => 'superadmin@admin.com',
                'password' => Hash::make('qwerty'),
                'role_id' => 1,
                'division_id' => 1
            ],
            [
                'name' => 'Supervisor SKAI',
                'email' => 'supervisorskai@gmail.com',
                'password' => Hash::make('qwerty'),
                'role_id' => 2,
                'division_id' => 1

            ],
            [
                'name' => 'Operator SKAI',
                'email' => 'operatorskai@gmail.com',
                'password' => Hash::make('qwerty'),
                'role_id' => 3,
                'division_id' => 1

            ],
            [
                'name' => 'Supervisor Project',
                'email' => 'supervisorproject@gmail.com',
                'password' => Hash::make('qwerty'),
                'role_id' => 2,
                'division_id' => 2

            ],
            [
                'name' => 'Operator Project',
                'email' => 'operatorproject@gmail.com',
                'password' => Hash::make('qwerty'),
                'role_id' => 3,
                'division_id' => 2

            ],
            [
                'name' => 'Supervisor Product',
                'email' => 'supervisorproduct@gmail.com',
                'password' => Hash::make('qwerty'),
                'role_id' => 2,
                'division_id' => 3

            ],
            [
                'name' => 'Operator Product',
                'email' => 'operatorproduct@gmail.com',
                'password' => Hash::make('qwerty'),
                'role_id' => 3,
                'division_id' => 3

            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        };
    }
}
