<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Activity;
use App\Models\ActivityOutput;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        Activity::create([
            'activity_date' => '2022-12-01',
            'task_code' => 'HT-001',
            'activity_type' => 'ODOL (AP/AT)',
            'team_code' => 'MT-01',
            'contract_code' => 'ABC123',
        ]);

        ActivityOutput::create([
            'activity_id' => 1,
            'output_type' => 'Area Cleared (SQM)',
            'output_value' => 123,
        ]);

        ActivityOutput::create([
            'activity_id' => 1,
            'output_type' => 'Minutes Worked',
            'output_value' => 380,
        ]);

        ActivityOutput::create([
            'activity_id' => 1,
            'output_type' => 'Num Deminers',
            'output_value' => 8,
        ]);
    }
}
