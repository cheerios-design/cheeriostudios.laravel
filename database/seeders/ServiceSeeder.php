<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Web Design & Development',
                'short_description' => 'Custom responsive websites built with modern technologies',
                'description' => 'We create stunning, responsive websites that engage your audience and drive results. Our team uses the latest technologies including Laravel, React, and modern CSS frameworks to build fast, secure, and scalable web solutions.',
                'price' => 2500.00,
                'duration' => '2-4 weeks',
                'category' => 'Web Development',
                'features' => [
                    'Responsive Design',
                    'SEO Optimization',
                    'Content Management System',
                    'Mobile-First Approach',
                    'Fast Loading Times',
                    '1 Year Support'
                ],
                'sort_order' => 1,
            ],
            [
                'name' => 'Branding & Logo Design',
                'short_description' => 'Professional brand identity that makes you stand out',
                'description' => 'Build a memorable brand identity with our comprehensive branding services. We create logos, color palettes, typography systems, and brand guidelines that reflect your business values and resonate with your target audience.',
                'price' => 1200.00,
                'duration' => '1-2 weeks',
                'category' => 'Design',
                'features' => [
                    'Logo Design',
                    'Brand Color Palette',
                    'Typography Selection',
                    'Brand Guidelines',
                    'Business Card Design',
                    '3 Revision Rounds'
                ],
                'sort_order' => 2,
            ],
            [
                'name' => 'E-commerce Development',
                'short_description' => 'Complete online store solutions with payment integration',
                'description' => 'Launch your online business with our comprehensive e-commerce solutions. We build secure, feature-rich online stores with payment processing, inventory management, and order tracking capabilities.',
                'price' => 4500.00,
                'duration' => '4-6 weeks',
                'category' => 'Web Development',
                'features' => [
                    'Product Management',
                    'Payment Gateway Integration',
                    'Inventory Tracking',
                    'Order Management',
                    'Customer Accounts',
                    'SEO Ready',
                    'Mobile Responsive'
                ],
                'sort_order' => 3,
            ],
            [
                'name' => 'Social Media Management',
                'short_description' => 'Strategic social media presence to grow your audience',
                'description' => 'Grow your online presence with our social media management services. We create engaging content, manage your social accounts, and implement strategies that increase followers and drive engagement.',
                'price' => 800.00,
                'duration' => 'Monthly',
                'category' => 'Marketing',
                'features' => [
                    'Content Creation',
                    'Daily Posting',
                    'Community Management',
                    'Analytics Reports',
                    'Hashtag Strategy',
                    'Brand Consistency'
                ],
                'sort_order' => 4,
            ],
            [
                'name' => 'Custom Software Development',
                'short_description' => 'Tailored software solutions for your business needs',
                'description' => 'Get custom software applications built specifically for your business requirements. We develop desktop applications, web applications, and mobile apps using cutting-edge technologies.',
                'price' => 6000.00,
                'duration' => '6-12 weeks',
                'category' => 'Software Development',
                'features' => [
                    'Custom Development',
                    'Database Design',
                    'API Integration',
                    'User Training',
                    'Documentation',
                    'Ongoing Support'
                ],
                'sort_order' => 5,
            ],
            [
                'name' => 'SEO Optimization',
                'short_description' => 'Improve your search engine rankings and visibility',
                'description' => 'Boost your website\'s visibility in search engines with our comprehensive SEO services. We optimize your content, improve site structure, and implement strategies to increase organic traffic.',
                'price' => 1500.00,
                'duration' => '2-3 months',
                'category' => 'Marketing',
                'features' => [
                    'Keyword Research',
                    'On-Page Optimization',
                    'Technical SEO',
                    'Content Strategy',
                    'Backlink Building',
                    'Monthly Reports'
                ],
                'sort_order' => 6,
            ],
        ];

        foreach ($services as $serviceData) {
            Service::create($serviceData);
        }
    }
}
