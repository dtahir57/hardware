<?php

use Illuminate\Database\Seeder;
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
        Permission::create(['module' => 'permission', 'name' => 'View_Permission']);
        Permission::create(['module' => 'permission', 'name' => 'Add_Permission']);
        Permission::create(['module' => 'permission', 'name' => 'Edit_Permission']);
        Permission::create(['module' => 'permission', 'name' => 'Delete_Permission']);

        Permission::create(['module' => 'role', 'name' => 'View_Role']);
        Permission::create(['module' => 'role', 'name' => 'Add_Role']);
        Permission::create(['module' => 'role', 'name' => 'Edit_Role']);
        Permission::create(['module' => 'role', 'name' => 'Delete_Role']);

        Permission::create(['module' => 'user', 'name' => 'View_User']);
        Permission::create(['module' => 'user', 'name' => 'Add_User']);
        Permission::create(['module' => 'user', 'name' => 'Edit_User']);
        Permission::create(['module' => 'user', 'name' => 'Delete_User']);
    }
}
