<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'read user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('create user');
        $role->givePermissionTo('read user');
        $role->givePermissionTo('update user');
        $role->givePermissionTo('delete user');

        $role = Role::create(['name' => 'cliente']);
        $role->givePermissionTo('update user');
        $role->givePermissionTo('read user');



        //
    }
}
