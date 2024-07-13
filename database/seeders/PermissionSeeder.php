<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name' => 'manage-users']);
        Permission::create(['name' => 'upload-files']);
        Permission::create(['name' => 'view-uploads']);
    }
}
