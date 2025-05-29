@extends('layouts.app')

@section('title', isset($service) ? 'Contact About ' . $service->name : 'Contact Us')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        <svg class="w-3 h-3 mr-2.5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"></path>
                        </svg>
                        <a href="{{ route('services.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Services</a>
                    </div>
                </li>
                @if(isset($service))
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"></path>
                        </svg>
                        <a href="{{ route('services.show', $service) }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">{{ $service->name }}</a>
                    </div>
                </li>
                @endif
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Contact</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-3">
                <!-- Contact Form -->
                <div class="lg:col-span-2 p-8">
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">
                            @if(isset($service))
                                Get a Quote for {{ $service->name }}
                            @else
                                Contact Us About Our Services
                            @endif
                        </h1>
                        <p class="text-lg text-gray-600">
                            @if(isset($service))
                                Ready to get started with {{ $service->name }}? Fill out the form below and we'll get back to you with a detailed quote within 24 hours.
                            @else
                                Have questions about our services? We'd love to hear from you. Fill out the form below and we'll get back to you as soon as possible.
                            @endif
                        </p>
                    </div>

                    <!-- Display Success Message -->
                    @if(session('success'))
                        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-green-800">
                                        {{ session('success') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Contact Form -->
                    <form action="{{ route('services.submit-inquiry') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        @if(isset($service))
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Full Name *
                                </label>
                                <input type="text" id="name" name="name" required
                                       value="{{ old('name', auth()->user()->name ?? '') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-300 @enderror">
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email Address *
                                </label>
                                <input type="email" id="email" name="email" required
                                       value="{{ old('email', auth()->user()->email ?? '') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-300 @enderror">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                    Phone Number
                                </label>
                                <input type="tel" id="phone" name="phone"
                                       value="{{ old('phone') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('phone') border-red-300 @enderror">
                                @error('phone')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="company" class="block text-sm font-medium text-gray-700 mb-2">
                                    Company Name
                                </label>
                                <input type="text" id="company" name="company"
                                       value="{{ old('company') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('company') border-red-300 @enderror">
                                @error('company')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        @if(!isset($service))
                        <div>
                            <label for="service_interest" class="block text-sm font-medium text-gray-700 mb-2">
                                Service of Interest
                            </label>
                            <select id="service_interest" name="service_interest"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('service_interest') border-red-300 @enderror">
                                <option value="">Select a service...</option>
                                <option value="web-development" {{ old('service_interest') == 'web-development' ? 'selected' : '' }}>Web Development</option>
                                <option value="design" {{ old('service_interest') == 'design' ? 'selected' : '' }}>Design & Branding</option>
                                <option value="marketing" {{ old('service_interest') == 'marketing' ? 'selected' : '' }}>Digital Marketing</option>
                                <option value="software" {{ old('service_interest') == 'software' ? 'selected' : '' }}>Custom Software</option>
                                <option value="other" {{ old('service_interest') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('service_interest')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        <div>
                            <label for="budget" class="block text-sm font-medium text-gray-700 mb-2">
                                Project Budget
                            </label>
                            <select id="budget" name="budget"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('budget') border-red-300 @enderror">
                                <option value="">Select budget range...</option>
                                <option value="under-5k" {{ old('budget') == 'under-5k' ? 'selected' : '' }}>Under $5,000</option>
                                <option value="5k-10k" {{ old('budget') == '5k-10k' ? 'selected' : '' }}>$5,000 - $10,000</option>
                                <option value="10k-25k" {{ old('budget') == '10k-25k' ? 'selected' : '' }}>$10,000 - $25,000</option>
                                <option value="25k-50k" {{ old('budget') == '25k-50k' ? 'selected' : '' }}>$25,000 - $50,000</option>
                                <option value="over-50k" {{ old('budget') == 'over-50k' ? 'selected' : '' }}>Over $50,000</option>
                            </select>
                            @error('budget')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="timeline" class="block text-sm font-medium text-gray-700 mb-2">
                                Project Timeline
                            </label>
                            <select id="timeline" name="timeline"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('timeline') border-red-300 @enderror">
                                <option value="">Select timeline...</option>
                                <option value="asap" {{ old('timeline') == 'asap' ? 'selected' : '' }}>ASAP</option>
                                <option value="1-month" {{ old('timeline') == '1-month' ? 'selected' : '' }}>Within 1 month</option>
                                <option value="1-3-months" {{ old('timeline') == '1-3-months' ? 'selected' : '' }}>1-3 months</option>
                                <option value="3-6-months" {{ old('timeline') == '3-6-months' ? 'selected' : '' }}>3-6 months</option>
                                <option value="flexible" {{ old('timeline') == 'flexible' ? 'selected' : '' }}>Flexible</option>
                            </select>
                            @error('timeline')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                                Project Details *
                            </label>
                            <textarea id="message" name="message" rows="6" required
                                      placeholder="Please describe your project requirements, goals, and any specific features you need..."
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('message') border-red-300 @enderror">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="newsletter" name="newsletter" value="1"
                                   {{ old('newsletter') ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="newsletter" class="ml-2 block text-sm text-gray-700">
                                I'd like to receive updates about new services and special offers
                            </label>
                        </div>

                        <div class="pt-4">
                            <button type="submit"
                                    class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
                                Send Inquiry
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Sidebar -->
                <div class="bg-gray-50 p-8">
                    @if(isset($service))
                        <!-- Service Summary -->
                        <div class="mb-8">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">Service Summary</h3>
                            <div class="bg-white rounded-lg p-6 shadow-sm">
                                @if($service->image_url)
                                    <img src="{{ $service->image_url }}" alt="{{ $service->name }}" class="w-full h-32 object-cover rounded-lg mb-4">
                                @endif
                                <h4 class="font-semibold text-gray-900 mb-2">{{ $service->name }}</h4>
                                <p class="text-gray-600 text-sm mb-4">{{ $service->short_description }}</p>
                                <div class="space-y-2 text-sm">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Starting Price:</span>
                                        <span class="font-semibold text-blue-600">${{ number_format($service->price) }}</span>
                                    </div>
                                    @if($service->duration)
                                        <div class="flex justify-between">
                                            <span class="text-gray-600">Duration:</span>
                                            <span class="font-semibold">{{ $service->duration }}</span>
                                        </div>
                                    @endif
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Category:</span>
                                        <span class="font-semibold">{{ ucfirst(str_replace('-', ' ', $service->category)) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Contact Information -->
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Get in Touch</h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-blue-600 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <div>
                                    <p class="font-medium text-gray-900">Email</p>
                                    <p class="text-gray-600">hello@studio.com</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-blue-600 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                <div>
                                    <p class="font-medium text-gray-900">Phone</p>
                                    <p class="text-gray-600">+1 (555) 123-4567</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-blue-600 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div>
                                    <p class="font-medium text-gray-900">Response Time</p>
                                    <p class="text-gray-600">Within 24 hours</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Process Steps -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Our Process</h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-semibold mr-3">
                                    1
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Consultation</p>
                                    <p class="text-sm text-gray-600">We'll discuss your project requirements and goals</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-semibold mr-3">
                                    2
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Proposal</p>
                                    <p class="text-sm text-gray-600">Receive a detailed quote and project timeline</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-semibold mr-3">
                                    3
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Development</p>
                                    <p class="text-sm text-gray-600">We'll bring your project to life with regular updates</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-semibold mr-3">
                                    4
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Launch</p>
                                    <p class="text-sm text-gray-600">Deploy your project and provide ongoing support</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
