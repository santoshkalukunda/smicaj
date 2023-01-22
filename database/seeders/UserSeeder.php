<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                //super admin
                $role = Role::create(['name' => 'super-admin']);
                $user = User::create([
                    'name' => 'Super Admin',
                    'email' => 'superadmin@gmail.com',
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                ]);
                $user->assignRole($role);
        
                //admin user
                $role = Role::create(['name' => 'admin']);
                $user = User::create([
                    'name' => 'Admin',
                    'email' => 'admin@gmail.com',
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                ]);
                $user->assignRole($role);
        
                //user
                $role = Role::create(['name' => 'user']);
                $user = User::create([
                    'name' => 'User',
                    'email' => 'user@gmail.com',
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                ]);
                $user->assignRole($role);
          
    }
}
