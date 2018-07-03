<?php

use Illuminate\Database\Seeder;
use Hardware\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'Super User',
        	'email' => 'super_user@hardware.com',
        	'password' => bcrypt('123456')
        ]);
        $user->assignRole('Super_User');
    }
}
