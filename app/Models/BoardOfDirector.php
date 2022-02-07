<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardOfDirector extends Model
{
    use HasFactory, Sluggable;
    protected $table = "board_of_directors";

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['degree', 'name', 'lastname'],
            ]
        ];
    }
}
