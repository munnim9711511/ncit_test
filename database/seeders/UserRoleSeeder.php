<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 
use App\Models\Role; 
class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  public function run()
    {
        $password = Hash::make('wellcome@123');
        $timestamp = now();

        // 1. Create Roles (Use Eloquent to ensure IDs are available)
        $roles = [
            'head' => Role::create(['name' => 'head', 'created_at' => $timestamp, 'updated_at' => $timestamp]),
            'staff' => Role::create(['name' => 'staff', 'created_at' => $timestamp, 'updated_at' => $timestamp]),
            'technician' => Role::create(['name' => 'technician', 'created_at' => $timestamp, 'updated_at' => $timestamp]),
        ];
        
        // 2. Define and Create Users
        $usersToCreate = [
            [
                'name' => 'Head User',
                'email' => 'head@example.com',
                'password' => $password,
                'role_name' => 'head'
            ],
            [
                'name' => 'Staff User',
                'email' => 'staff@example.com',
                'password' => $password,
                'role_name' => 'staff'
            ],
            [
                'name' => 'Tech User',
                'email' => 'tech@example.com',
                'password' => $password,
                'role_name' => 'technician'
            ],
        ];

        foreach ($usersToCreate as $userData) {
            $roleName = $userData['role_name'];
            
            // Create the User
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => $userData['password'],
                'email_verified_at' => $timestamp,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
                // Additional fields like f_name, l_name, etc., will be null unless specified
            ]);
            
            // 3. Link User to the Role in the 'user_roles' table
            if (isset($roles[$roleName])) {
                DB::table('user_roles')->insert([
                    'user_id' => $user->id,
                    'role_id' => $roles[$roleName]->id,
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ]);
            }
        }
    }
}
