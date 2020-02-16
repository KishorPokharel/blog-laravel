<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        //fetch roles
        $adminRole = Role::where('role', 'Admin')->first();
        $userRole = Role::where('role', 'User')->first();

        //create users
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('user'),
        ]);

        //attach roles
        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);


    }
}
