<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	$cartItems = Cart::content();
	$categories = Hardware\Http\Models\Category::where('is_active', 1)->get();
	$featured = Hardware\Http\Models\Product::where('is_featured', 1)->get();
    return view('welcome', compact('categories', 'featured', 'cartItems'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/shop', 'ShopController@index')->name('shop.index');

Route::get('/shop/single_product/{category}/{product}', 'ShopController@getSingleProduct')->name('shop.getSingleProduct');

Route::get('/cart', 'CartController@index')->name('cart.index');

Route::get('/cart/{id}', 'CartController@show')->name('cart.show');

Route::post('/cart/{id}', 'CartController@post')->name('cart.post');

Route::get('/cart/item/remove/{id}', 'CartController@removeItem')->name('cart.remove');

Route::patch('/cart/item/update/{id}', 'CartController@update')->name('cart.update');

Route::get('/cart/items/flush', 'CartController@flush')->name('cart.flush');

Route::get('/shop/{slug}', 'ShopController@show')->name('category.show');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
	Route::post('/checkout/paypal', 'Payment\PaypalController@store')->name('paypal.store');
});

Route::group(['middleware' => 'auth', 'prefix' => '/admin'], function () {
	/**
	 * Starting Routes For PermissionController
	 */
	Route::group(['middleware' => ['permission:View_Permission']], function() {
		Route::get('permissions', 'UserManagement\PermissionController@index')->name('permission.index');
	});
	Route::group(['middleware' => ['permission:Add_Permission']], function () {
		Route::get('permissions/create', 'UserManagement\PermissionController@create')->name('permission.create');
		Route::post('permissions', 'UserManagement\PermissionController@store')->name('permission.store');
	});
	Route::group(['middleware' => ['permission:Edit_Permission']], function () {
		Route::get('permissions/{id}/edit', 'UserManagement\PermissionController@edit')->name('permission.edit');
		Route::patch('permissions/{id}', 'UserManagement\PermissionController@update')->name('permission.update');
	});
	Route::group(['middleware' => ['permission:Delete_Permission']], function () {
		Route::get('permissions/destroy/{id}', 'UserManagement\PermissionController@destroy')->name('permission.destroy');
	});
	/**
	 * Ending Routes For PermissionController
	 */
	
	/**
	 * Starting Routes For RoleController
	 */
	Route::group(['middleware' => ['permission:View_Role']], function () {
		Route::get('roles', 'UserManagement\RoleController@index')->name('role.index');
	});
	Route::group(['middleware' => ['permission:Add_Role']], function () {
		Route::get('roles/create', 'UserManagement\RoleController@create')->name('role.create');
		Route::post('roles', 'UserManagement\RoleController@store')->name('role.store');
	});
	Route::group(['middleware' => ['permission:Edit_Role']], function () {
		Route::get('roles/{id}/edit', 'UserManagement\RoleController@edit')->name('role.edit');
		Route::patch('roles/{id}', 'UserManagement\RoleController@update')->name('role.update');
	});
	Route::group(['middleware' => ['permission:Delete_Role']], function () {
		Route::get('roles/destroy/{id}', 'UserManagement\RoleController@destroy')->name('role.destroy');
	});
	/**
	 * Ending Routes For RoleController
	 */
	
	/**
	 * Starting Routes For UserController
	 */
	Route::group(['middleware' => ['permission:View_User']], function () {
		Route::get('users', 'UserManagement\UserController@index')->name('user.index');
	});
	Route::group(['middleware' => ['permission:Add_User']], function () {
		Route::get('users/create', 'UserManagement\UserController@create')->name('user.create');
		Route::post('users', 'UserManagement\UserController@store')->name('user.store');
	});
	Route::group(['middleware' => ['permission:Edit_User']], function () {
		Route::get('users/{id}/edit', 'UserManagement\UserController@edit')->name('user.edit');
		Route::patch('users/{id}', 'UserManagement\UserController@update')->name('user.update');
	});
	Route::group(['middleware' => ['permission:Delete_User']], function () {
		Route::get('users/destroy/{id}', 'UserManagement\UserController@destroy')->name('user.destroy');
	});
	/**
	 * Ending Routes For UserController
	 */
	
	/**
	 * Starting Routes For CategoryController
	 */
	Route::group(['middleware' => ['permission:View_Category']], function () {
		Route::get('categories', 'Settings\CategoryController@index')->name('category.index');
	});
	Route::group(['middleware' => ['permission:Add_Category']], function () {
		Route::get('categories/create', 'Settings\CategoryController@create')->name('category.create');
		Route::post('categories', 'Settings\CategoryController@store')->name('category.store');
	});
	Route::group(['middleware' => ['permission:Edit_Category']], function () {
		Route::get('categories/{id}/edit', 'Settings\CategoryController@edit')->name('category.edit');
		Route::patch('categories/{id}', 'Settings\CategoryController@update')->name('category.update');
	});
	Route::group(['middleware' => ['permission:Delete_Category']], function () {
		Route::get('categories/destroy/{id}', 'Settings\CategoryController@destroy')->name('category.destroy');
	});
	Route::group(['middleware' => ['permission:Feature_Category']], function () {
		Route::post('categories/feature', 'Settings\CategoryController@feature')->name('category.feature');
	});
	/**
	 * Ending Routes For CategoryController
	 */
	
	/**
	 * Starting Routes For ManufacturerController
	 */
	Route::group(['middleware' => ['permission:View_Manufacturer']], function () {
		Route::get('manufacturers', 'Settings\ManufacturerController@index')->name('manufacturer.index');
	});
	Route::group(['middleware' => ['permission:Add_Manufacturer']], function () {
		Route::get('manufacturer/create', 'Settings\ManufacturerController@create')->name('manufacturer.create');
		Route::post('manufacturers', 'Settings\ManufacturerController@store')->name('manufacturer.store');
	});
	Route::group(['middleware' => ['permission:Edit_Manufacturer']], function () {
		Route::get('manufacturers/{id}/edit', 'Settings\ManufacturerController@edit')->name('manufacturer.edit');
		Route::patch('manufacturers/{id}', 'Settings\ManufacturerController@update')->name('manufacturer.update');
	});
	Route::group(['middleware' => ['permission:Delete_Manufacturer']], function () {
		Route::get('manufacturers/destroy/{id}', 'Settings\ManufacturerController@destroy')->name('manufacturer.destroy'); 
	});
	/**
	 * Ending Routes For ManufacturerController
	 */
	
	/**
	 * Starting Routes For AttributeController
	 */
	Route::group(['middleware' => ['permission:View_Attribute']], function () {
		Route::get('attributes', 'Settings\AttributeController@index')->name('attribute.index');
	});
	Route::group(['middleware' => ['permission:Add_Attribute']], function () {
		Route::get('attributes/create', 'Settings\AttributeController@create')->name('attribute.create');
		Route::post('attributes', 'Settings\AttributeController@store')->name('attribute.store');
	});
	Route::group(['middleware' => ['permission:Edit_Attribute']], function () {
		Route::get('attributes/{id}/edit', 'Settings\AttributeController@edit')->name('attribute.edit');
		Route::patch('attributes/{id}', 'Settings\AttributeController@update')->name('attribute.update');
	});
	Route::group(['middleware' => ['permission:Delete_Attribute']], function () {
		Route::get('attributes/destroy/{id}', 'Settings\AttributeController@destroy')->name('attribute.destroy');
	});
	/**
	 * Ending Routes For AttributeController
	 */

	/**
	 * Starting Routes For TagController
	 */
	Route::group(['middleware' => ['permission:View_Tag']], function () {
		Route::get('tags', 'Settings\TagController@index')->name('tag.index');
	});
	Route::group(['middleware' => ['permission:Add_Tag']], function () {
		Route::get('tags/create', 'Settings\TagController@create')->name('tag.create');
		Route::post('tags', 'Settings\TagController@store')->name('tag.store');
	});
	Route::group(['middleware' => ['permission:Edit_Tag']], function () {
		Route::get('tags/{id}/edit', 'Settings\TagController@edit')->name('tag.edit');
		Route::patch('tags/{id}', 'Settings\TagController@update')->name('tag.update');
	});
	Route::group(['middleware' => ['permission:Delete_Tag']], function () {
		Route::get('tags/destroy/{id}', 'Settings\TagController@destroy')->name('tag.destroy');
	});
	/**
	 * Ending Routes For TagController
	 */
	
	/**
	 * Starting Routes For BadgeController
	 */
	Route::group(['middleware' => ['permission:View_Badge']], function () {
		Route::get('badges', 'Settings\BadgeController@index')->name('badge.index');
	});
	Route::group(['middleware' => ['permission:Add_Badge']], function () {
		Route::get('badges/create', 'Settings\BadgeController@create')->name('badge.create');
		Route::post('badges', 'Settings\BadgeController@store')->name('badge.store');
	});
	Route::group(['middleware' => ['permission:Edit_Badge']], function () {
		Route::get('badges/{id}/edit', 'Settings\BadgeController@edit')->name('badge.edit');
		Route::patch('badges/{id}', 'Settings\BadgeController@update')->name('badge.update');
	});
	Route::group(['middleware' => ['permission:Delete_Badge']], function () {
		Route::get('badges/destroy/{id}', 'Settings\BadgeController@destroy')->name('badge.destroy');
	});
	/**
	 * Ending Routes For BadgeController
	 */
	
	/**
	 * Starting Routes For UnitController
	 */
	Route::group(['middleware' => ['permission:View_Unit']], function () {
		Route::get('units', 'Settings\UnitController@index')->name('unit.index');
	});
	Route::group(['middleware' => ['permission:Add_Unit']], function () {
		Route::get('units/create', 'Settings\UnitController@create')->name('unit.create');
		Route::post('units', 'Settings\UnitController@store')->name('unit.store');
	});
	Route::group(['middleware' => ['permission:Edit_Unit']], function () {
		Route::get('units/{id}/edit', 'Settings\UnitController@edit')->name('unit.edit');
		Route::patch('units/{id}', 'Settings\UnitController@update')->name('unit.update');
	});
	Route::group(['middleware' => ['permission:Delete_Unit']], function () {
		Route::get('units/destroy/{id}', 'Settings\UnitController@destroy')->name('unit.destroy');
	});
	/**
	 * Ending Routes For UnitController
	 */
	
	/**
	 * Starting Routes For ProductConditionController
	 */
	Route::group(['middleware' => ['permission:View_Product_Condition']], function () {
		Route::get('product_conditions', 'Settings\ProductConditionController@index')->name('product_condition.index');
	});
	Route::group(['middleware' => ['permission:Add_Product_Condition']], function () {
		Route::get('product_conditions/create', 'Settings\ProductConditionController@create')->name('product_condition.create');
		Route::post('product_conditions', 'Settings\ProductConditionController@store')->name('product_condition.store');
	});
	Route::group(['middleware' => ['permission:Edit_Product_Condition']], function () {
		Route::get('product_conditions/{id}/edit', 'Settings\ProductConditionController@edit')->name('product_condition.edit');
		Route::patch('product_conditions/{id}', 'Settings\ProductConditionController@update')->name('product_condition.update');
	});
	Route::group(['middleware' => ['permission:Delete_Product_Condition']], function () {
		Route::get('product_conditions/destroy/{id}', 'Settings\ProductConditionController@destroy')->name('product_condition.destroy');
	});
	/**
	 * Ending Routes For ProductConditionController
	 */
	
	/**
	 * Starting Routes For ShippingRuleController
	 */
	Route::group(['middleware' => ['permission:View_Shipping_Rule']], function () {
		Route::get('shipping_rules', 'Settings\ShippingRuleController@index')->name('shipping_rule.index');
	});
	Route::group(['middleware' => ['permission:Add_Shipping_Rule']], function () {
		Route::get('shipping_rules/create', 'Settings\ShippingRuleController@create')->name('shipping_rule.create');
		Route::post('shipping_rules', 'Settings\ShippingRuleController@store')->name('shipping_rule.store');
	});
	Route::group(['middleware' => ['permission:Edit_Shipping_Rule']], function () {
		Route::get('shipping_rules/{id}/edit', 'Settings\ShippingRuleController@edit')->name('shipping_rule.edit');
		Route::patch('shipping_rules/{id}', 'Settings\ShippingRuleController@update')->name('shipping_rule.update');
	});
	Route::group(['middleware' => ['permission:Delete_Shipping_Rule']], function () {
		Route::get('shipping_rules/destroy/{id}', 'Settings\ShippingRuleController@destroy')->name('shipping_rule.destroy');
	});
	/**
	 * Ending Routes For ShippingRuleController
	 */
	
	/**
	 * Starting Routes For ECommerceSettingController
	 */
	Route::group(['middleware' => ['role:Super_User']], function () {
		Route::get('settings', 'Settings\ECommerceSettingController@index')->name('setting.index');
		Route::post('settings/shipping', 'Settings\ECommerceSettingController@store')->name('setting.shipping.store');
		Route::post('settings/search', 'Settings\ECommerceSettingController@storeSearch')->name('setting.search.store');
	});
	/**
	 * Ending Routes For ECommerceSettingController
	 */
	
	/**
	 * Starting Routes For SupplierController
	 */
	Route::group(['middleware' => ['permission:View_Supplier']], function () {
		Route::get('suppliers', 'Settings\SupplierController@index')->name('supplier.index');
	});
	Route::group(['middleware' => ['permission:Add_Supplier']], function () {
		Route::get('suppliers/create', 'Settings\SupplierController@create')->name('supplier.create');
		Route::post('suppliers', 'Settings\SupplierController@store')->name('supplier.store');
	});
	Route::group(['middleware' => ['permission:Edit_Supplier']], function () {
		Route::get('suppliers/{id}/edit', 'Settings\SupplierController@edit')->name('supplier.edit');
		Route::patch('suppliers/{id}', 'Settings\SupplierController@update')->name('supplier.update');
	});
	Route::group(['middleware' => ['permission:Delete_Supplier']], function () {
		Route::get('suppliers/destroy/{id}', 'Settings\SupplierController@destroy')->name('supplier.destroy');
	});
	/**
	 * Ending Routes For SupplierController
	 */

	/**
	 * Starting Routes For ProductController
	 */
	Route::group(['middleware' => ['permission:View_Product']], function () {
		Route::get('products', 'Settings\ProductController@index')->name('product.index');
	});
	Route::group(['middleware' => ['permission:Add_Product']], function () {
		Route::get('products/create', 'Settings\ProductController@create')->name('product.create');
		Route::post('products', 'Settings\ProductController@store')->name('product.store');
	});
	Route::group(['middleware' => ['permission:Edit_Product']], function () {
		Route::get('products/{id}/edit', 'Settings\ProductController@edit')->name('product.edit');
		Route::patch('products/{id}', 'Settings\ProductController@update')->name('product.update');
	});
	Route::group(['middleware' => ['permission:Delete_Product']], function () {
		Route::get('products/destroy/{id}', 'Settings\ProductController@destroy')->name('product.destroy');
	});
	/**
	 * Ending Routes For ProductController
	 */
});
