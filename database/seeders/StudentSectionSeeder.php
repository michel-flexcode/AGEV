<?php

namespace Database\Seeders;

use App\Models\Section;
use App\Models\Student;
use App\Models\StudentSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentSection::factory()->count(14)->create();
    }
}
