<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function index(): View
    {
        $stats = [
            'total_users' => User::count(),
            'admin_users' => User::where('role', 'admin')->count(),
            'regular_users' => User::where('role', 'user')->count(),
            'recent_users' => User::where('created_at', '>=', now()->subDays(30))->count(),
        ];

        $recent_users = User::orderBy('created_at', 'desc')->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_users'));
    }

    /**
     * Show users management page.
     */
    public function users(): View
    {
        $users = User::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.users', compact('users'));
    }

    /**
     * Show specific user details.
     */
    public function showUser(User $user): View
    {
        return view('admin.user-details', compact('user'));
    }

    /**
     * Update user role.
     */
    public function updateUserRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:user,admin'
        ]);

        $user->update(['role' => $request->role]);

        return redirect()->back()->with('success', 'User role updated successfully.');
    }

    /**
     * Delete user.
     */
    public function deleteUser(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }
}
