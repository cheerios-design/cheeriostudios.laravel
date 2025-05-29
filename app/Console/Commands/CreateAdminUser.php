<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create {--email=admin@cheeriostudios.com} {--password=admin123} {--name=Admin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an admin user for the system';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->option('email');
        $password = $this->option('password');
        $name = $this->option('name');

        // Check if user already exists
        $existingUser = User::where('email', $email)->first();
        
        if ($existingUser) {
            if ($existingUser->role === 'admin') {
                $this->info("Admin user with email {$email} already exists.");
                
                // Update password if needed
                if ($this->confirm('Would you like to update the password?')) {
                    $existingUser->password = Hash::make($password);
                    $existingUser->save();
                    $this->info('Password updated successfully.');
                }
                return;
            } else {
                // Convert existing user to admin
                $existingUser->role = 'admin';
                $existingUser->password = Hash::make($password);
                $existingUser->save();
                $this->info("Existing user {$email} has been converted to admin.");
                return;
            }
        }

        // Create new admin user
        $admin = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        $this->info("Admin user created successfully:");
        $this->line("Name: {$admin->name}");
        $this->line("Email: {$admin->email}");
        $this->line("Role: {$admin->role}");
        $this->line("Password: {$password}");
        $this->newLine();
        $this->info("You can now login at: /admin/login");
    }
}
