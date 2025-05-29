@extends('admin.layout')

@section('title', 'User Details - ' . $user->name)

@section('content')
<div class="px-4 sm:px-0">
    <!-- Page Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">User Details</h1>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    View and manage user account information.
                </p>
            </div>
            <a href="{{ route('admin.users') }}" 
               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                ← Back to Users
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- User Profile Card -->
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center space-x-6">
                        <div class="w-20 h-20 bg-{{ $user->isAdmin() ? 'red' : 'amber' }}-500 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-2xl">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </span>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $user->name }}</h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
                            <div class="mt-2">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $user->isAdmin() ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 border-t border-gray-200 dark:border-gray-700 pt-6">
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Full Name</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->name }}</dd>
                            </div>
                            
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Email Address</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->email }}</dd>
                            </div>

                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Phone Number</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->phone ?: 'Not provided' }}</dd>
                            </div>

                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Company</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->company ?: 'Not provided' }}</dd>
                            </div>

                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Website</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                                    @if($user->website)
                                        <a href="{{ $user->website }}" target="_blank" class="text-red-600 hover:text-red-500">
                                            {{ $user->website }}
                                        </a>
                                    @else
                                        Not provided
                                    @endif
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Member Since</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->created_at->format('F j, Y') }}</dd>
                            </div>

                            @if($user->bio)
                            <div class="sm:col-span-2">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Bio</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->bio }}</dd>
                            </div>
                            @endif
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions & Info Sidebar -->
        <div class="space-y-6">
            <!-- Role Management -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white mb-4">Role Management</h3>
                    
                    <form method="POST" action="{{ route('admin.users.update-role', $user) }}">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                User Role
                            </label>
                            <select name="role" id="role" 
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md dark:bg-gray-700 dark:text-white">
                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                        <button type="submit" 
                                class="w-full bg-red-600 border border-transparent rounded-md py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Update Role
                        </button>
                    </form>
                </div>
            </div>

            <!-- Account Actions -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white mb-4">Account Actions</h3>
                    
                    <div class="space-y-3">
                        @if($user->id !== auth()->id())
                            <form method="POST" action="{{ route('admin.users.delete', $user) }}" 
                                  onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-full bg-red-600 border border-transparent rounded-md py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    Delete User
                                </button>
                            </form>
                        @else
                            <p class="text-sm text-gray-500 dark:text-gray-400 text-center">
                                You cannot delete your own account.
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Account Statistics -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white mb-4">Account Statistics</h3>
                    
                    <dl class="space-y-3">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Account Status</dt>
                            <dd class="mt-1">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $user->email_verified_at ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $user->email_verified_at ? 'Verified' : 'Unverified' }}
                                </span>
                            </dd>
                        </div>

                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Created</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                                {{ $user->created_at->format('M j, Y g:i A') }}
                                <div class="text-xs text-gray-500">{{ $user->created_at->diffForHumans() }}</div>
                            </dd>
                        </div>

                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Last Updated</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                                {{ $user->updated_at->format('M j, Y g:i A') }}
                                <div class="text-xs text-gray-500">{{ $user->updated_at->diffForHumans() }}</div>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
