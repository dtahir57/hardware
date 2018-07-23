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

        Permission::create(['module' => 'category', 'name' => 'View_Category']);
        Permission::create(['module' => 'category', 'name' => 'Add_Category']);
        Permission::create(['module' => 'category', 'name' => 'Edit_Category']);
        Permission::create(['module' => 'category', 'name' => 'Delete_Category']);
        Permission::create(['module' => 'category', 'name' => 'Feature_Category']);

        Permission::create(['module' => 'manufacturer', 'name' => 'View_Manufacturer']);
        Permission::create(['module' => 'manufacturer', 'name' => 'Add_Manufacturer']);
        Permission::create(['module' => 'manufacturer', 'name' => 'Edit_Manufacturer']);
        Permission::create(['module' => 'manufacturer', 'name' => 'Delete_Manufacturer']);

        Permission::create(['module' => 'attribute', 'name' => 'View_Attribute']);
        Permission::create(['module' => 'attribute', 'name' => 'Add_Attribute']);
        Permission::create(['module' => 'attribute', 'name' => 'Edit_Attribute']);
        Permission::create(['module' => 'attribute', 'name' => 'Delete_Attribute']);

        Permission::create(['module' => 'tag', 'name' => 'View_Tag']);
        Permission::create(['module' => 'tag', 'name' => 'Add_Tag']);
        Permission::create(['module' => 'tag', 'name' => 'Edit_Tag']);
        Permission::create(['module' => 'tag', 'name' => 'Delete_Tag']);

        Permission::create(['module' => 'badge', 'name' => 'View_Badge']);
        Permission::create(['module' => 'badge', 'name' => 'Add_Badge']);
        Permission::create(['module' => 'badge', 'name' => 'Edit_Badge']);
        Permission::create(['module' => 'badge', 'name' => 'Delete_Badge']);

        Permission::create(['module' => 'unit', 'name' => 'View_Unit']);
        Permission::create(['module' => 'unit', 'name' => 'Add_Unit']);
        Permission::create(['module' => 'unit', 'name' => 'Edit_Unit']);
        Permission::create(['module' => 'unit', 'name' => 'Delete_Unit']);
    }
}
