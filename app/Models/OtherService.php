<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherService extends Model
{
    use HasFactory, Sluggable;
    protected $table = "other_services";

    public function summaries()
    {
        return $this->hasMany(OtherServiceSummary::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
