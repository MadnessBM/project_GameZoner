<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        if (!$email || !$password) {
            throw new RuntimeException(
                'Укажи ADMIN_EMAIL и ADMIN_PASSWORD в файле .env'
            );
        }

        $user = User::firstOrNew([
            'email' => $email,
        ]);

        $user->name = 'GameZone Admin';
        $user->password = Hash::make($password);
        $user->is_admin = true;
        $user->save();
    }
}
