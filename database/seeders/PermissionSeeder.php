<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            ['id' => 1, 'name' => 'admin' , 'guard_name' => 'web'],
            ['id' => 2, 'name' => 'user' , 'guard_name' => 'web']
        ]);

        Permission::insert([
            ['id' => 1, 'name' => 'dashboard', 'guard_name' => 'web'],
            ['id' => 2, 'name' => 'wallet', 'guard_name' => 'web'],
            ['id' => 3, 'name' => 'users', 'guard_name' => 'web']
        ]);
        $role = Role::find(1);
        $role->givePermissionTo(Permission::all());

        $user = User::first();
        $user->assignRole('admin');

        $role = Role::find(2);
        $role->givePermissionTo(1);
        $role->givePermissionTo(2);

    }
}
