import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

export default function Dashboard() {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard" />
            <div className="flex h-full flex-1 flex-col gap-6 p-4">
                {/* Welcome Section */}
                <div className="dashboard-card bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                    <div className="px-6 py-4">
                        <h1 className="text-2xl font-bold text-gray-900 dark:text-white uppercase mb-2">
                            Welcome back!
                        </h1>
                        <p className="text-gray-600 dark:text-gray-400">
                            You're now logged into your Cheerio Studio dashboard. Here you can manage your projects, view our services, and track your account details.
                        </p>
                    </div>
                </div>

                {/* Dashboard Grid */}
                <div className="dashboard-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    {/* Account Info Card */}
                    <div className="dashboard-card bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                        <div className="p-5">
                            <div className="flex items-center">
                                <div className="flex-shrink-0">
                                    <div className="w-8 h-8 bg-blue-500 rounded-md flex items-center justify-center">
                                        <svg className="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div className="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt className="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                            Account Info
                                        </dt>
                                        <dd className="text-lg font-medium text-gray-900 dark:text-white">
                                            Your Account
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div className="bg-gray-50 dark:bg-gray-700 px-5 py-3">
                            <div className="text-sm">
                                <a href="/profile" className="font-medium text-amber-600 hover:text-amber-500">
                                    View profile settings
                                </a>
                            </div>
                        </div>
                    </div>

                    {/* Projects Card */}
                    <div className="dashboard-card bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                        <div className="p-5">
                            <div className="flex items-center">
                                <div className="flex-shrink-0">
                                    <div className="w-8 h-8 bg-green-500 rounded-md flex items-center justify-center">
                                        <svg className="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div className="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt className="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                            Active Projects
                                        </dt>
                                        <dd className="text-lg font-medium text-gray-900 dark:text-white">
                                            0 Projects
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div className="bg-gray-50 dark:bg-gray-700 px-5 py-3">
                            <div className="text-sm">
                                <a href="#contact" className="font-medium text-amber-600 hover:text-amber-500">
                                    Start new project
                                </a>
                            </div>
                        </div>
                    </div>

                    {/* Services Card */}
                    <div className="dashboard-card bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                        <div className="p-5">
                            <div className="flex items-center">
                                <div className="flex-shrink-0">
                                    <div className="w-8 h-8 bg-amber-500 rounded-md flex items-center justify-center">
                                        <svg className="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div className="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt className="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                            Our Services
                                        </dt>
                                        <dd className="text-lg font-medium text-gray-900 dark:text-white">
                                            Browse & Order
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div className="bg-gray-50 dark:bg-gray-700 px-5 py-3">
                            <div className="text-sm">
                                <a href="/services" className="font-medium text-amber-600 hover:text-amber-500">
                                    Browse services →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {/* Recent Activity */}
                <div className="dashboard-card bg-white dark:bg-gray-800 shadow-sm rounded-lg">
                    <div className="px-6 py-4">
                        <h3 className="text-lg leading-6 font-medium text-gray-900 dark:text-white uppercase">
                            Recent Activity
                        </h3>
                        <div className="mt-5">
                            <div className="text-center py-8">
                                <svg className="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                <h3 className="mt-2 text-sm font-medium text-gray-900 dark:text-white">No activity yet</h3>
                                <p className="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                    Get started by exploring our services or contacting us for a new project.
                                </p>
                                <div className="mt-6">
                                    <div className="flex space-x-3 justify-center">
                                        <a href="/services" 
                                            className="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                                            Browse Services
                                        </a>
                                        <a href="/contact" 
                                            className="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-600">
                                            Contact Us
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
