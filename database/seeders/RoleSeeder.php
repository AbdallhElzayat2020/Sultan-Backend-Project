<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create([
            'name' => 'super-admin',
            'display_name' => 'Super Admin',
            'guard_name' => 'web',
        ]);
    }
}
