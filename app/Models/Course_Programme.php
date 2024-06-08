<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_Programme extends Model
{
    use HasFactory;

    protected $table = 'course_programme';

    protected $fillable = [
        'name', 'course_id', 'programme_id', 'type'
    ];
}
