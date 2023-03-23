<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use App\Enums\CTFStatus;
use App\Models\Challenge;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        \App\Models\CTF::factory()->create([
            'name'        => 'Mini CTF',
            'description' => 'We are proud to announce our first Capture The Flag competition of this year. If you are looking to get into the CTF world, this will be a perfect chance as it will be a welcoming and friendly challenge! There will also be some advanced tasks to keep the CTF exciting for all the experienced players.',
            'date'        => Carbon::createFromDate(2022, 12, 16),
            'status'      => CTFStatus::FINISHED
        ]);

        \App\Models\CTF::factory()->create([
            'name'        => 'SecuriNets ISI Quals',
            'description' => 'We are proud to announce our first Capture The Flag competition of this year. If you are looking to get into the CTF world, this will be a perfect chance as it will be a welcoming and friendly challenge! There will also be some advanced tasks to keep the CTF exciting for all the experienced players.',
            'date'        => Carbon::createFromDate(2023, 2, 24),
            'status'      => CTFStatus::RUNNING
        ]);

        \App\Models\CTF::factory()->create([
            'name'        => 'SecuriNets ISI Finals',
            'description' => 'We are proud to announce our first Capture The Flag competition of this year. If you are looking to get into the CTF world, this will be a perfect chance as it will be a welcoming and friendly challenge! There will also be some advanced tasks to keep the CTF exciting for all the experienced players.',
            'date'        => Carbon::createFromDate(2023, 3, 19),
            'status'      => CTFStatus::UPCOMING
        ]);

        Challenge::factory(30)->create();
    }
}
