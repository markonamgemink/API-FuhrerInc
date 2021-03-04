<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'admin'
        ]);
        Permission::create([
            'name' => 'user'
        ]);

        $admin = Role::where('name', 'admin')->first();
        $admin->permissions()->attach([1]);
        $users = Role::where('name', 'user')->first();
        $users->permissions()->attach([2]);
    }
}
