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
            'general_comments' => $this->faker->text(200),
            'course_difficulty' => $this->faker->numberBetween(1, 5),
            'course_contribution' => $this->faker->text(200),
            'notes_paper_format' => $this->faker->boolean(),
            'notes_pdf_format' => $this->faker->boolean(),
            'notes_during_lecture' => $this->faker->boolean(),
            'notes_other_format' => $this->faker->word(),
            'learning_adaptation' => $this->faker->numberBetween(1, 5),
            'course_objectives_school_brochure' => $this->faker->boolean(),
            'course_objectives_class_handout' => $this->faker->boolean(),
            'course_objectives_oral' => $this->faker->boolean(),
            'course_objectives_online' => $this->faker->boolean(),
            'course_objectives_absent' => $this->faker->boolean(),
            'course_objectives_not_transmitted' => $this->faker->boolean(),
            'course_objectives_not_interested' => $this->faker->boolean(),
            'course_objectives_other' => $this->faker->sentence(),
            'objectives_achieved' => $this->faker->randomElement(['oui', 'non', 'sans_avis']),
            'objectives_achieved_comment' => $this->faker->text(200),
            'course_material_quantity' => $this->faker->numberBetween(1, 3),
            'info_before_tests' => $this->faker->randomElement(['insuffisant', 'faible', 'satisfaisant', 'bon', 'très_bon']),
            'clarity_of_test_grading' => $this->faker->randomElement(['insuffisant', 'faible', 'satisfaisant', 'bon', 'très_bon']),
            'clarity_of_exam_grading' => $this->faker->randomElement(['insuffisant', 'faible', 'satisfaisant', 'bon', 'très_bon']),
            'assessment_relevance' => $this->faker->randomElement(['pas_du_tout', 'plutôt_non', 'sans_avis', 'plutôt_oui', 'tout_à_fait']),
            'assessment_relevance_comment' => $this->faker->text(200),
            'solutions_provided_for_weaknesses' => $this->faker->boolean(),
            'most_appreciated_in_training' => $this->faker->text(200),
            'least_appreciated_in_training' => $this->faker->text(200),
            'general_remarks' => $this->faker->text(200),
        ];
    }
}

