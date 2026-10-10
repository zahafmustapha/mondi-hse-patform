<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'duration_hours'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'enrollments')
                    ->withPivot('status', 'completed_at')
                    ->withTimestamps();
    }
}