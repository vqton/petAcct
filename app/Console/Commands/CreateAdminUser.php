<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUser extends Command
{
    // The name and signature of the console command
    protected $signature = 'create:admin';

    // The console command description
    protected $description = 'Create a new administrator user with roles, permissions, and policies';

    // Execute the console command
    public function handle()
    {
        $name = $this->ask('Name');
        $email = $this->ask('Email');
        $password = $this->secret('Password');

        // Validate if email already exists
        if (User::where('email', $email)->exists()) {
            $this->error('User with this email already exists.');
            return;
        }

        // Create the user
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        // Create or find the Admin role
        $role = Role::firstOrCreate(['name' => 'admin']);

        // Assign role to the user
        $user->assignRole($role);

        // Create necessary permissions (you can add more as needed)
        $permissions = [
            'view users',
            'create users',
            'update users',
            'delete users',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign all permissions to the admin role
        $role->syncPermissions($permissions);

        // Notify the user
        if ($user) {
            $this->info('Administrator created successfully with the necessary roles and permissions!');
        } else {
            $this->error('Failed to create administrator.');
        }
    }
}
