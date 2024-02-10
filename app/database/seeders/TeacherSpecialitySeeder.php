<?php

namespace Database\Seeders;

use App\Models\TeacherSpeciality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeacherSpeciality::factory()->count(14)->create();
    }
}
