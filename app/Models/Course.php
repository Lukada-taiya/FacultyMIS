<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'code', 'lecturer_id', 'semester_id'
    ];



    public function lecturer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'lecturer_id');
    }


    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class);
    }

    public function programmes(): BelongsToMany
    {
        return $this->belongsToMany(Programme::class, 'course_programme', 'course_id', 'programme_id')->withPivot('type');
    }

    public function level() : BelongsTo {
        return $this->belongsTo(Level::class, 'level_id');
    }
}
