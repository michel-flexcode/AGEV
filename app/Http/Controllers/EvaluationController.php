<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Evaluation;

class EvaluationController extends Controller
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Validez vos champs ici, par exemple:

            'student_id'=> 'required',
            'course_id'=> 'required',
            'quality_of_course_material' => 'required',
            'quality_of_exercises' => 'required',
            'interest_in_course'=> 'required',
            'interaction_possibility' => 'required',
            'assessment_mode'=> 'required',
            'links_with_other_courses'=> 'required',
            'equipment_provided' => 'required',
            'practical_part' => 'required',
            'relationship_with_class_and_teacher'=> 'required',
            'general_comments' => 'required',
            'course_difficulty'=> 'required',
            'course_contribution'=> 'required',
            'notes_paper_format' => 'required',
            'notes_pdf_format' => 'required',
            'notes_during_lecture'=> 'required',
            'notes_other_format' => 'required',
            'learning_adaptation' => 'required',
            'course_objectives_school_brochure' => 'required',
            'course_objectives_class_handout' => 'required',
            'course_objectives_oral' => 'required',
            'course_objectives_online' => 'required',
            'course_objectives_absent' => 'required',
            'course_objectives_not_transmitted' => 'required',
            'course_objectives_not_interested' => 'required',
            'course_objectives_other'=> 'required',
            'objectives_achieved' => 'required',
            'objectives_achieved_comment'=> 'required',
            'course_material_quantity' => 'required',
            'info_before_tests' => 'required',
            'clarity_of_test_grading'=> 'required',
            'clarity_of_exam_grading' => 'required',
            'assessment_relevance'=> 'required',
            'assessment_relevance_comment' => 'required',
            'solutions_provided_for_weaknesses' => 'required',
            'most_appreciated_in_training' => 'required',
            'least_appreciated_in_training' => 'required',
            'general_remarks' => 'required',
        ]);

        $evaluation = Evaluation::create($validatedData);

        return redirect()->route('evaluations.create')->with('success', 'Évaluation enregistrée avec succès!');
    }
}
