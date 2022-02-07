<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrativeTeam extends Model
{
    use HasFactory, Sluggable;
    protected $table = "administrative_teams";

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['degree', 'name', 'lastname'],
            ]
        ];
    }
}
