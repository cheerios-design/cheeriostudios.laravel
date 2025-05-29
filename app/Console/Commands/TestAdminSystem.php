<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class TestAdminSystem extends Command
{
    protected $signature = 'admin:test';
    protected $description = 'Test the admin system functionality';

    public function handle()
    {
        $this->info('Testing Admin System:');
        $this->info('====================');

        $admin = User::where('email', 'admin@cheeriostudios.com')->first();
        $testUser = User::where('email', 'test@cheeriostudios.com')->first();

        if ($admin) {
            $this->info('✅ Admin user exists');
            $this->line("   Email: {$admin->email}");
            $this->line("   Role: {$admin->role}");
            $this->line("   Is Admin: " . ($admin->isAdmin() ? 'YES' : 'NO'));
        } else {
            $this->error('❌ Admin user not found');
        }

        $this->newLine();

        if ($testUser) {
            $this->info('✅ Test user exists');
            $this->line("   Email: {$testUser->email}");
            $this->line("   Role: {$testUser->role}");
            $this->line("   Is Admin: " . ($testUser->isAdmin() ? 'YES' : 'NO'));
        } else {
            $this->error('❌ Test user not found');
        }

        $this->newLine();
        $this->info('User Statistics:');
        $this->line('Total Users: ' . User::count());
        $this->line('Admin Users: ' . User::where('role', 'admin')->count());
        $this->line('Regular Users: ' . User::where('role', 'user')->count());

        $this->newLine();
        $this->info('✅ Admin system test completed!');
        
        return 0;
    }
}
