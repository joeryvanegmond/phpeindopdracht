<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_dmanager  = Role::where('name', 'manager')->first();

        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@admin';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $manager = new User();
        $manager->name = 'manager';
        $manager->email = 'manager@manager';
        $manager->password = bcrypt('manager');
        $manager->save();
        $manager->roles()->attach($role_dmanager);
    }
}
