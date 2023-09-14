<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function hods(): HasMany
    {
        return $this->hasMany(User::class, 'department_id');
    }

    public function programmes(): HasMany
    {
        return $this->hasMany(Programme::class);
    }
}
