<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'course_id',
        'quality_of_course_material',
        'quality_of_exercises',
        'interest_in_course',
        'interaction_possibility',
        'assessment_mode',
        'links_with_other_courses',
        'equipment_provided',
        'practical_part',
        'relationship_with_class_and_teacher',
        'general_comments',
        'course_difficulty',
        'course_contribution',
        'notes_paper_format',
        'notes_pdf_format',
        'notes_during_lecture',
        'notes_other_format',
        'learning_adaptation',
        'course_objectives_school_brochure',
        'course_objectives_class_handout',
        'course_objectives_oral',
        'course_objectives_online',
        'course_objectives_absent',
        'course_objectives_not_transmitted',
        'course_objectives_not_interested',
        'course_objectives_other',
        'objectives_achieved',
        'objectives_achieved_comment',
        'course_material_quantity',
        'info_before_tests',
        'clarity_of_test_grading',
        'clarity_of_exam_grading',
        'assessment_relevance',
        'assessment_relevance_comment',
        'solutions_provided_for_weaknesses',
        'most_appreciated_in_training',
        'least_appreciated_in_training',
        'general_remarks',
        // Vous pouvez continuer à ajouter d'autres champs ici si votre migration évolue
    ];

    /**
     * Relation avec l'étudiant.
     * Une évaluation appartient à un étudiant.
     *
     * @return BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Relation avec le cours.
     * Une évaluation appartient à un cours.
     *
     * @return BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    // Vous pouvez ajouter ici d'autres méthodes de relation si nécessaire
}
