<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthCorner extends Model
{
    use HasFactory, Sluggable;
    protected $table = 'health_corners';

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class)->withPivot('doctor_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
