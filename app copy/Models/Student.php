<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Student extends Model
{
    use HasFactory;
    //OLD polymorphism
    // protected $model = User::class;

    protected $fillable = [
        'name',
        'surname',
        'phone',
        'email',
    ];

    public function StudentSections(): BelongsToMany
    {
        return $this->belongsToMany(StudentSection::class, 'student_sections');
    }

    public function StudentCourses(): BelongsToMany
    {
        return $this->belongsToMany(StudentCourse::class, 'student_courses');
    }
}
