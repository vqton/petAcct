<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Service::create([
            'title' => 'Tax Preparation',
            'description' => 'We provide comprehensive tax preparation services for individuals and businesses.',
            'icon' => 'tax-preparation-icon.png', // Optional if you use icons
        ]);

        Service::create([
            'title' => 'Bookkeeping',
            'description' => 'Accurate and reliable bookkeeping services to help manage your financial records.',
            'icon' => 'bookkeeping-icon.png',
        ]);

        Service::create([
            'title' => 'Financial Consulting',
            'description' => 'Expert financial consulting services to help you make informed decisions.',
            'icon' => 'financial-consulting-icon.png',
        ]);
    }
}
