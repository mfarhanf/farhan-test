<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClaimSubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('claim_submissions')->insert([
            [
                'username' => 'John Doe',
                'date' => '2023-01-01',
                'benefit_id' => 1,
                'description' => 'sick',
                'amount' => 100000,
                'approval_status' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username' => 'Emily Doe',
                'date' => '2023-06-01',
                'benefit_id' => 1,
                'description' => 'sick',
                'amount' => 200000,
                'approval_status' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username' => 'David Doe',
                'date' => '2023-09-01',
                'benefit_id' => 1,
                'description' => 'sick',
                'amount' => 200000,
                'approval_status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
