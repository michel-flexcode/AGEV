<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        // Ajoutez d'autres champs spécifiques à Section si nécessaire
    ];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'student_sections');
    }
}
