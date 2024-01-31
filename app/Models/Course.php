<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        // Ajoutez d'autres champs spécifiques à Course si nécessaire
    ];

    // Relation avec un professeur (belongsTo car un cours appartient à un professeur)
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    // Relation avec la table intermédiaire StudentCourse (many-to-many avec Student)
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'student_courses');
    }

    // Relation avec la table intermédiaire SectionCourse (many-to-many avec Section)
    public function sections(): BelongsToMany
    {
        return $this->belongsToMany(Section::class, 'section_courses');
    }

    // Relation avec les évaluations (un cours peut avoir plusieurs évaluations)
    public function evaluations(): HasMany
    {
        return $this->hasMany(Evaluation::class);
    }
}
