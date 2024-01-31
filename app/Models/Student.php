<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Student extends Model
{
    use HasFactory;
    protected $model = User::class;

    protected $fillable = [
        'user_id',
    ];

    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }
}
