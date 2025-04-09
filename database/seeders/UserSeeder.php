<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure roles exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Create 2 admin users with specific emails
        $adminUsers = [
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'phone_number' => '1234567890',
                'is_active' => 'Y',
            ],
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('admin123'),
                'phone_number' => '0987654321',
                'is_active' => 'Y',
            ],
        ];

        foreach ($adminUsers as $userData) {
            $user = User::firstOrCreate(
                ['email' => $userData['email']],
                $userData
            );
            $user->assignRole($adminRole);
            $this->command->info("Admin user {$userData['email']} created or already exists");
        }

        // Create 10 regular users
        for ($i = 1; $i <= 10; $i++) {
            $email = "user{$i}@gmail.com";

            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => "User {$i}",
                    'password' => Hash::make('user123'),
                    'phone_number' => "555000{$i}",
                    'is_active' => 'Y',
                ]
            );

            $user->assignRole($userRole);
            $this->command->info("Regular user {$email} created or already exists");
        }
    }
}
