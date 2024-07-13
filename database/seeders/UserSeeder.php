<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Periksa apakah akun admin sudah ada
        if (User::where('email', 'admin@example.com')->doesntExist()) {
            // Buat akun admin
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'npwp' => '099999910085',
            ]);

            // Assign role admin ke user admin
            $adminRole = Role::where('name', 'admin')->first();
            $admin->assignRole($adminRole);
        }
    }
}
