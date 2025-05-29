<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServicesController extends Controller
{
    /**
     * Display a listing of all services
     */
    public function index(): View
    {
        $services = Service::active()->ordered()->get();
        $categories = Service::active()->pluck('category')->unique()->sort();
        
        return view('services.index', compact('services', 'categories'));
    }

    /**
     * Display the specified service
     */
    public function show(Service $service): View
    {
        abort_if(!$service->is_active, 404);
        
        $relatedServices = Service::active()
            ->where('category', $service->category)
            ->where('id', '!=', $service->id)
            ->limit(3)
            ->get();
            
        return view('services.show', compact('service', 'relatedServices'));
    }

    /**
     * Display services by category
     */
    public function category(string $category): View
    {
        $services = Service::active()->byCategory($category)->ordered()->get();
        $allCategories = Service::active()->pluck('category')->unique()->sort();
        
        abort_if($services->isEmpty(), 404);
        
        return view('services.category', compact('services', 'category', 'allCategories'));
    }    /**
     * Show contact form for a specific service or general contact
     */
    public function contact(Request $request): View
    {
        $service = null;
        
        // Check if a specific service was requested
        if ($request->has('service') && $request->service) {
            $service = Service::where('id', $request->service)
                             ->where('is_active', true)
                             ->first();
        }
        
        return view('services.contact', compact('service'));
    }

    /**
     * Handle service inquiry submission
     */
    public function submitInquiry(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'service_id' => 'nullable|exists:services,id',
            'service_interest' => 'nullable|string|max:100',
            'budget' => 'nullable|string|max:100',
            'timeline' => 'nullable|string|max:100',
            'message' => 'required|string|max:2000',
            'newsletter' => 'nullable|boolean',
        ]);

        // Here you would typically send an email or store the inquiry
        // For now, we'll just return with a success message
        
        $service = null;
        if ($request->service_id) {
            $service = Service::find($request->service_id);
        }
        
        if ($service) {
            return redirect()->route('services.show', $service)
                ->with('success', 'Thank you for your inquiry about ' . $service->name . '! We\'ll get back to you within 24 hours.');
        }
        
        return redirect()->route('services.contact')
            ->with('success', 'Thank you for your inquiry! We\'ll get back to you within 24 hours.');
    }
}
