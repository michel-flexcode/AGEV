<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        // Ajoutez d'autres champs spécifiques à Evaluation si nécessaire
    ];
    // Relation avec l'étudiant (belongsTo car une évaluation appartient à un étudiant)
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    // Relation avec le cours (belongsTo car une évaluation appartient à un cours)
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
