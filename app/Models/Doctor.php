<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['degree', 'name', 'lastname', 'slug'];

    protected $dates = ['date_of_birth'];

    public function departments()
    {
        return $this->belongsToMany(Department::class)->withPivot('department_id');
    }

    public function working_times()
    {
        return $this->belongsToMany(WorkingTimes::class);
    }

    public function health_corners()
    {
        return $this->belongsToMany(HealthCorner::class)->withPivot('health_corner_id');
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['degree', 'name', 'lastname'],
            ]
        ];
    }
}
