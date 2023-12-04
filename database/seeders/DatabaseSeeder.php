<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\BenefitSeeder;
use Database\Seeders\ClaimSubmissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BenefitSeeder::class,
            ClaimSubmissionSeeder::class,
        ]);

        $this->command->info('All tables seeded!');
    }
}
