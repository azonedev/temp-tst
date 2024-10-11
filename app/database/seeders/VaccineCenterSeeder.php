<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VaccineCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('vaccine_centers')->insert([
            [
                'name' => 'Dhanmondi Health Clinic',
                'location' => 'Dhanmondi, Dhaka',
                'daily_capacity' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mirpur Medical Center',
                'location' => 'Mirpur, Dhaka',
                'daily_capacity' => 80,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Uttara Community Health',
                'location' => 'Uttara, Dhaka',
                'daily_capacity' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Banani Clinic',
                'location' => 'Banani, Dhaka',
                'daily_capacity' => 90,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gulshan Healthcare',
                'location' => 'Gulshan, Dhaka',
                'daily_capacity' => 70,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mohammadpur Medical',
                'location' => 'Mohammadpur, Dhaka',
                'daily_capacity' => 110,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tejgaon Health Center',
                'location' => 'Tejgaon, Dhaka',
                'daily_capacity' => 85,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Shahbag Wellness Clinic',
                'location' => 'Shahbag, Dhaka',
                'daily_capacity' => 95,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bashundhara Medical',
                'location' => 'Bashundhara, Dhaka',
                'daily_capacity' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Farmgate Health Center',
                'location' => 'Farmgate, Dhaka',
                'daily_capacity' => 75,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
