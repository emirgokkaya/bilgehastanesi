<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, Sluggable;
    protected $fillable = ['name', 'slug'];

    public function departments() {
        return $this->belongsToMany(Department::class)->withPivot('department_id');
    }

    public function summaries()
    {
        return $this->hasMany(ServiceSummary::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ]
        ];
    }
}
