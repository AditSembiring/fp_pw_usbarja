<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = [
            'name' => 'UsbarjaGang',
            'email' => 'admin@usbarja.com',
            'password' => bcrypt('adminusbarja354'),
        ];

        User::create($user);
    }
}
