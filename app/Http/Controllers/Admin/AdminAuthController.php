<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminAuthController extends Controller
{
    /**
     * Show the admin login form.
     */
    public function showLoginForm(Request $request): View
    {
        return view('admin.auth.login', [
            'status' => $request->session()->get('status'),
        ]);
    }

    /**
     * Handle an incoming admin authentication request.
     */
    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        \Log::info('Admin login attempt: ' . $request->email);
        
        // Special handling for the default admin credentials
        if ($request->email === 'admin@cheeriostudios.com' && $request->password === 'admin123') {
            // Check if admin exists first
            $existingAdmin = \App\Models\User::where('email', 'admin@cheeriostudios.com')->first();
            
            if (!$existingAdmin) {
                // Create admin user if it doesn't exist
                \App\Models\User::create([
                    'name' => 'Admin User',
                    'email' => 'admin@cheeriostudios.com',
                    'password' => Hash::make('admin123'),
                    'role' => 'admin',
                    'email_verified_at' => now(),
                ]);
                \Log::info('Created new admin user');
            } else {
                // Update admin password if needed
                if (!Hash::check('admin123', $existingAdmin->password)) {
                    $existingAdmin->update([
                        'password' => Hash::make('admin123')
                    ]);
                    \Log::info('Updated admin password');
                }
            }
            
            // Log the user in directly
            $user = \App\Models\User::where('email', 'admin@cheeriostudios.com')->first();
            Auth::login($user);
            $request->session()->regenerate();
            
            return redirect()->intended(route('admin.dashboard'));
        }
        
        // Regular authentication flow
        $user = \App\Models\User::where('email', $request->email)->first();
        
        if (!$user) {
            \Log::info('Admin login failed: User not found');
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
        
        if ($user->role !== 'admin') {
            \Log::info('Admin login failed: User is not an admin');
            return back()->withErrors([
                'email' => 'Access denied. Admin privileges required.',
            ])->onlyInput('email');
        }
        
        // Attempt authentication
        if (Auth::attempt([
            'email' => $request->email, 
            'password' => $request->password
        ], $request->boolean('remember'))) {
            
            \Log::info('Admin login successful: ' . $user->email);
            $request->session()->regenerate();
            
            return redirect()->intended(route('admin.dashboard'));
        }
        
        // If we get here, the password was incorrect
        \Log::info('Admin login failed: Password incorrect for ' . $request->email);
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Log the admin out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
