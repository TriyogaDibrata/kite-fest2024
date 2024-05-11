<?php

namespace Database\Seeders;

use App\Models\User;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();

        try {
            $admin_pendafataran = User::create([
                'name' => 'Admin Pendaftaran',
                'email' => 'admin_regis@devtest.com',
                'email_verified_at' => now(),
                'password' => Hash::make('devdemo123'),
                'remember_token' => Str::random(50)
            ]);

            $admin_penilaian = User::create([
                'name' => 'Admin Penilaian',
                'email' => 'admin_judge@devtest.com',
                'email_verified_at' => now(),
                'password' => Hash::make('devdemo123'),
                'remember_token' => Str::random(50)
            ]);

            $super_admin = User::create([
                'name' => 'Super Admin',
                'email' => 'super_admin@devtest.com',
                'email_verified_at' => now(),
                'password' => Hash::make('devdemo123'),
                'remember_token' => Str::random(50)
            ]);

            $participant = User::create([
                'name' => 'Participant',
                'email' => 'participant@devtest.com',
                'email_verified_at' => now(),
                'password' => Hash::make('devdemo123'),
                'remember_token' => Str::random(50)
            ]);

            $developer = User::create([
                'name' => 'Developer',
                'email' => 'developer@devtest.com',
                'email_verified_at' => now(),
                'password' => Hash::make('devdemo123'),
                'remember_token' => Str::random(50)
            ]);

            $role = Role::create(['name' => 'admin-regis']);
            $role = Role::create(['name' => 'admin-judge']);
            $role = Role::create(['name' => 'super-admin']);
            $role = Role::create(['name' => 'participant']);
            $role = Role::create(['name' => 'developer']);

            $developer->assignRole('developer');
            $admin_pendafataran->assignRole('admin-regis');
            $admin_penilaian->assignRole('admin-judge');
            $participant->assignRole('participant');
            $super_admin->assignRole('super-admin');

            

            // $operator = User::create([
            //     'email' => 'operator@devtest.com',
            //     'name' => 'operator',
            //     'email_verified_at' => now(),
            //     'password' => Hash::make('devdemo123'),
            //     'remember_token' => Str::random(10),
            // ]);
    
            // $admin = User::create([
            //     'email' => 'admin@devtest.com',
            //     'name' => 'admin',
            //     'email_verified_at' => now(),
            //     'password' => Hash::make('devdemo123'),
            //     'remember_token' => Str::random(10),
            // ]);
    
            // $role_operator = Role::create([
            //     'name' => 'operator',
            // ]);
    
            // $role_admin = Role::create([
            //     'name' => 'admin',
            // ]);
    
            // $permission = Permission::create(['name' => 'read-role']);
            // $permission = Permission::create(['name' => 'create-role']);
            // $permission = Permission::create(['name' => 'update-role']);
            // $permission = Permission::create(['name' => 'delete-role']);
            // $permission = Permission::create(['name' => 'read-konfigurasi']);

            // $role_admin->givePermissionTo('read-role');
            // $role_admin->givePermissionTo('create-role');
            // $role_admin->givePermissionTo('update-role');
            // $role_admin->givePermissionTo('delete-role');
            // $role_admin->givePermissionTo('read-konfigurasi');

    
            // $operator->assignRole('operator');
            // $admin->assignRole('admin');

            DB::commit();
        } catch(Exception $e) {
            DB::rollBack();
        }
        
    }
}
