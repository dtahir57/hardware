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

        Permission::create(['module' => 'product', 'name' => 'View_Product']);
        Permission::create(['module' => 'product', 'name' => 'Add_Product']);
        Permission::create(['module' => 'product', 'name' => 'Edit_Product']);
        Permission::create(['module' => 'product', 'name' => 'Delete_Product']);

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

        Permission::create(['module' => 'product_condition', 'name' => 'View_Product_Condition']);
        Permission::create(['module' => 'product_condition', 'name' => 'Add_Product_Condition']);
        Permission::create(['module' => 'product_condition', 'name' => 'Edit_Product_Condition']);
        Permission::create(['module' => 'product_condition', 'name' => 'Delete_Product_Condition']);

        Permission::create(['module' => 'shipping_rule', 'name' => 'View_Shipping_Rule']);
        Permission::create(['module' => 'shipping_rule', 'name' => 'Add_Shipping_Rule']);
        Permission::create(['module' => 'shipping_rule', 'name' => 'Edit_Shipping_Rule']);
        Permission::create(['module' => 'shipping_rule', 'name' => 'Delete_Shipping_Rule']);

        Permission::create(['module' => 'supplier', 'name' => 'View_Supplier']);
        Permission::create(['module' => 'supplier', 'name' => 'Add_Supplier']);
        Permission::create(['module' => 'supplier', 'name' => 'Edit_Supplier']);
        Permission::create(['module' => 'supplier', 'name' => 'Delete_Supplier']);

        Permission::create(['module' => 'order', 'name' => 'View_Order']);
        Permission::create(['module' => 'order', 'name' => 'Get_Order']);
        Permission::create(['module' => 'order', 'name' => 'Update_Order']);
    }
}
