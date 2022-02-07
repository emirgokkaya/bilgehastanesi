<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InThePress extends Model
{
    use HasFactory, Sluggable;
    protected $table = "in_the_press";

    /*protected $dates = ['history'];*/

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ]
        ];
    }
}
