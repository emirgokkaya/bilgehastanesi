<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Department extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['name', 'slug'];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class)->withPivot('doctor_id');
    }

    public function services() {
        return $this->belongsToMany(Service::class)->withPivot('service_id');
    }

    public function summaries()
    {
        return $this->hasMany(Summary::class);
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
