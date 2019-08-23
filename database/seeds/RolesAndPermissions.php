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

        Permission::create(['name' => 'admin lugares']);
        Permission::create(['name' => 'crear lugares']);
        Permission::create(['name' => 'editar lugares']);
        Permission::create(['name' => 'borrar lugares']);

        permission::create(['name' => 'admin eventos']);
        Permission::create(['name' => 'crear eventos']);
        Permission::create(['name' => 'editar eventos']);
        Permission::create(['name' => 'borrar eventos']);



        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('create user');
        $role->givePermissionTo('read user');
        $role->givePermissionTo('update user');
        $role->givePermissionTo('delete user');
        $role->givePermissionTo('admin lugares');
        $role->givePermissionTo('crear lugares');
        $role->givePermissionTo('editar lugares');
        $role->givePermissionTo('borrar lugares');
        $role->givePermissionTo('admin eventos');
        $role->givePermissionTo('crear eventos');
        $role->givePermissionTo('editar eventos');
        $role->givePermissionTo('borrar eventos');





        $role = Role::create(['name' => 'cliente']);
        $role->givePermissionTo('update user');
        $role->givePermissionTo('read user');



        //
    }
}
