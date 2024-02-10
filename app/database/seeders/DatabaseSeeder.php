<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Evaluation;
use App\Models\StudentSection;
use App\Models\TeacherSpeciality;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $this->call([
            QuestionSeeder::class,
            CourseSeeder::class,
            SectionSeeder::class,
            StudentSeeder::class,
            SpecialitySeeder::class,
            TeacherSeeder::class,
            EvaluationSeeder::class,
            StudentSectionSeeder::class,
            StudentCourseSeeder::class,
            TeacherSpecialitySeeder::class,
            SectionCourseSeeder::class,
        ]);
    }
}
