@extends('layouts.app')

@section('title', ucfirst(str_replace('-', ' ', $category)) . ' Services')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">{{ ucfirst(str_replace('-', ' ', $category)) }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="mb-12 text-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">
                {{ ucfirst(str_replace('-', ' ', $category)) }} Services
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                @switch($category)
                    @case('web-development')
                        Professional web development solutions to bring your digital vision to life with modern technologies and best practices.
                        @break
                    @case('design')
                        Creative design and branding services that make your business stand out with compelling visual identity.
                        @break
                    @case('marketing')
                        Strategic digital marketing solutions to grow your online presence and reach your target audience effectively.
                        @break
                    @case('software-development')
                        Custom software development services tailored to your specific business needs and requirements.
                        @break
                    @default
                        Explore our comprehensive range of professional services designed to help your business succeed.
                @endswitch
            </p>
        </div>

        <!-- Category Tabs -->
        <div class="flex flex-wrap justify-center mb-8 border-b border-gray-200">
            <a href="{{ route('services.index') }}" 
               class="px-6 py-3 text-sm font-medium text-gray-500 hover:text-gray-700 border-b-2 border-transparent hover:border-gray-300 transition-colors duration-200">
                All Services
            </a>
            <a href="{{ route('services.category', 'web-development') }}" 
               class="px-6 py-3 text-sm font-medium {{ $category === 'web-development' ? 'text-blue-600 border-blue-600' : 'text-gray-500 hover:text-gray-700' }} border-b-2 {{ $category === 'web-development' ? 'border-blue-600' : 'border-transparent hover:border-gray-300' }} transition-colors duration-200">
                Web Development
            </a>
            <a href="{{ route('services.category', 'design') }}" 
               class="px-6 py-3 text-sm font-medium {{ $category === 'design' ? 'text-blue-600 border-blue-600' : 'text-gray-500 hover:text-gray-700' }} border-b-2 {{ $category === 'design' ? 'border-blue-600' : 'border-transparent hover:border-gray-300' }} transition-colors duration-200">
                Design & Branding
            </a>
            <a href="{{ route('services.category', 'marketing') }}" 
               class="px-6 py-3 text-sm font-medium {{ $category === 'marketing' ? 'text-blue-600 border-blue-600' : 'text-gray-500 hover:text-gray-700' }} border-b-2 {{ $category === 'marketing' ? 'border-blue-600' : 'border-transparent hover:border-gray-300' }} transition-colors duration-200">
                Digital Marketing
            </a>
            <a href="{{ route('services.category', 'software-development') }}" 
               class="px-6 py-3 text-sm font-medium {{ $category === 'software-development' ? 'text-blue-600 border-blue-600' : 'text-gray-500 hover:text-gray-700' }} border-b-2 {{ $category === 'software-development' ? 'border-blue-600' : 'border-transparent hover:border-gray-300' }} transition-colors duration-200">
                Software Development
            </a>
        </div>

        @if($services->count() > 0)
            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach($services as $service)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 group">
                        @if($service->image_url)
                            <div class="h-48 overflow-hidden">
                                <img src="{{ $service->image_url }}" 
                                     alt="{{ $service->name }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-3">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                    {{ ucfirst(str_replace('-', ' ', $service->category)) }}
                                </span>
                                @if($service->duration)
                                    <span class="text-sm text-gray-500">{{ $service->duration }}</span>
                                @endif
                            </div>
                            
                            <h3 class="text-xl font-semibold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors duration-200">
                                {{ $service->name }}
                            </h3>
                            
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                {{ $service->short_description }}
                            </p>
                            
                            @if($service->features && count($service->features) > 0)
                                <div class="mb-4">
                                    <p class="text-sm font-medium text-gray-900 mb-2">Key Features:</p>
                                    <ul class="text-sm text-gray-600 space-y-1">
                                        @foreach(array_slice($service->features, 0, 3) as $feature)
                                            <li class="flex items-center">
                                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                                {{ $feature }}
                                            </li>
                                        @endforeach
                                        @if(count($service->features) > 3)
                                            <li class="text-blue-600 text-sm">+ {{ count($service->features) - 3 }} more features</li>
                                        @endif
                                    </ul>
                                </div>
                            @endif
                            
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-2xl font-bold text-gray-900">
                                        ${{ number_format($service->price) }}
                                    </span>
                                    <span class="text-gray-500 text-sm">starting at</span>
                                </div>
                                
                                <div class="flex space-x-2">
                                    <a href="{{ route('services.show', $service) }}" 
                                       class="px-4 py-2 text-blue-600 border border-blue-600 rounded-lg hover:bg-blue-50 transition-colors duration-200 text-sm font-medium">
                                        Learn More
                                    </a>
                                    <a href="{{ route('services.contact', ['service' => $service->id]) }}" 
                                       class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 text-sm font-medium">
                                        Get Quote
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Statistics -->
            <div class="bg-white rounded-xl shadow-lg p-8 mb-12">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-600 mb-2">{{ $services->count() }}</div>
                        <div class="text-gray-600">{{ ucfirst(str_replace('-', ' ', $category)) }} Services</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-600 mb-2">${{ number_format($services->min('price')) }}</div>
                        <div class="text-gray-600">Starting Price</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-600 mb-2">24h</div>
                        <div class="text-gray-600">Response Time</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-600 mb-2">100%</div>
                        <div class="text-gray-600">Satisfaction Rate</div>
                    </div>
                </div>
            </div>
        @else
            <!-- No Services Found -->
            <div class="text-center py-12">
                <svg class="mx-auto h-24 w-24 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No services found</h3>
                <p class="text-gray-600 mb-6">We don't have any {{ strtolower(str_replace('-', ' ', $category)) }} services available at the moment.</p>
                <div class="flex justify-center space-x-4">
                    <a href="{{ route('services.index') }}" 
                       class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                        View All Services
                    </a>
                    <a href="{{ route('services.contact') }}" 
                       class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                        Contact Us
                    </a>
                </div>
            </div>
        @endif

        <!-- Call to Action -->
        @if($services->count() > 0)
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl p-8 text-center text-white">
                <h2 class="text-3xl font-bold mb-4">Ready to Get Started?</h2>
                <p class="text-xl mb-6 opacity-90">
                    Let's discuss your {{ strtolower(str_replace('-', ' ', $category)) }} project and bring your vision to life.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('services.contact') }}" 
                       class="px-8 py-3 bg-white text-blue-600 rounded-lg font-semibold hover:bg-gray-100 transition-colors duration-200">
                        Get Free Consultation
                    </a>
                    <a href="{{ route('services.index') }}" 
                       class="px-8 py-3 border-2 border-white text-white rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors duration-200">
                        View All Services
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
