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
                'name' => 'Rizal',
                'email' => 'rizal@gmail.com',
                'password' => Hash::make('qwerty'),
                'role_id' => 2,
                'division_id' => 1

            ],
            [
                'name' => 'Angga',
                'email' => 'angga@gmail.com',
                'password' => Hash::make('qwerty'),
                'role_id' => 3,
                'division_id' => 1

            ],
            [
                'name' => 'Atep',
                'email' => 'atep@gmail.com',
                'password' => Hash::make('qwerty'),
                'role_id' => 2,
                'division_id' => 2

            ],
            [
                'name' => 'Ahmad',
                'email' => 'ahmad@gmail.com',
                'password' => Hash::make('qwerty'),
                'role_id' => 3,
                'division_id' => 2

            ],
            [
                'name' => 'Lanesra',
                'email' => 'lanesra@gmail.com',
                'password' => Hash::make('qwerty'),
                'role_id' => 2,
                'division_id' => 3

            ],
            [
                'name' => 'Anggi',
                'email' => 'anggi@gmail.com',
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
