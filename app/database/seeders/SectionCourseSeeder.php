<?php

namespace Database\Seeders;

use App\Models\SectionCourse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SectionCourse::factory()->count(14)->create();
    }
}
