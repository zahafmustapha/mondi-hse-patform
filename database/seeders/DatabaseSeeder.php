<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // إضافة موظفين تجريبيين
    \App\Models\User::factory()->create([
        'name' => 'أحمد العلوي',
        'email' => 'ahmed@mondi.com',
        'role' => 'employee',
    ]);

    \App\Models\User::factory()->create([
        'name' => 'مريم الإدريسي',
        'email' => 'meryem@mondi.com',
        'role' => 'employee',
    ]);

    \App\Models\User::factory()->create([
        'name' => 'يوسف التازي',
        'email' => 'youssef@mondi.com',
        'role' => 'employee',
    ]);
}
}
