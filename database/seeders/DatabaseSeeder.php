<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Asset;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (!User::query()->where('name', 'Ethan')->exists()) {
            User::factory()->create([
                'name'     => 'Ethan',
                'email'    => 'ethanabrace@gmail.com',
                'password' => bcrypt('password'),
            ]);
        }

        Service::create([
            'name' => 'Kitchen Remodeling',
            'slug' => 'kitchen-remodeling',
            'short_description' => 'Transform your kitchen into a modern, functional space.',
        ]);

        Service::create([
            'name' => 'Bathroom Remodeling',
            'slug' => 'bathroom-remodeling',
            'short_description' => 'Transform your bathroom into a modern, functional space.',
        ]);

        Service::create([
            'name' => 'Basement Remodeling',
            'slug' => 'basement-remodeling',
            'short_description' => 'Transform your basement into a modern, functional space.',
        ]);
    }
}
