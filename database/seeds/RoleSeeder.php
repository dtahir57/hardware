<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_user = Role::create(['name' => 'Super_User']);
        $super_user->givePermissionTo(['View_Permission', 'Add_Permission', 'Edit_Permission', 'Delete_Permission','View_Role', 'Add_Role', 'Edit_Role', 'Delete_Role', 'View_User', 'Add_User', 'Edit_User', 'Delete_User', 'View_Category', 'Add_Category', 'Edit_Category', 'Delete_Category', 'Feature_Category', 'View_Manufacturer', 'Add_Manufacturer', 'Edit_Manufacturer', 'Delete_Manufacturer', 'View_Attribute', 'Add_Attribute', 'Edit_Attribute', 'Delete_Attribute', 'View_Tag', 'Add_Tag', 'Edit_Tag', 'Delete_Tag', 'View_Badge', 'Add_Badge', 'Edit_Badge', 'Delete_Badge', 'View_Unit', 'Add_Unit', 'Edit_Unit', 'Delete_Unit', 'View_Product_Condition', 'Add_Product_Condition', 'Edit_Product_Condition', 'Delete_Product_Condition', 'View_Shipping_Rule', 'Add_Shipping_Rule', 'Edit_Shipping_Rule', 'Delete_Shipping_Rule', 'View_Supplier', 'Add_Supplier', 'Edit_Supplier', 'Delete_Supplier', 'View_Product', 'Add_Product', 'Edit_Product', 'Delete_Product']);
    }
}
