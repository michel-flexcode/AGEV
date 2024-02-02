<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evaluation>
 */
class EvaluationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'course_id' => Course::factory(),
            'quality_of_course_material' => $this->faker->numberBetween(1, 5),
            'quality_of_exercises' => $this->faker->numberBetween(1, 5),
            'interest_in_course' => $this->faker->numberBetween(1, 5),
            'interaction_possibility' => $this->faker->numberBetween(1, 5),
            'assessment_mode' => $this->faker->numberBetween(1, 5),
            'links_with_other_courses' => $this->faker->numberBetween(1, 5),
            'equipment_provided' => $this->faker->numberBetween(1, 5),
            'practical_part' => $this->faker->numberBetween(1, 5),
            'relationship_with_class_and_teacher' => $this->faker->numberBetween(1, 5),
        ];
    }
}
