<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = [


    ];

    //defino la relacion

    public function categories():BelongsToMany{
        //Lesson conoce Catengorias (m)
        return $this->belongsToMany(Category::class);
    }

    public function level():BelongsTo{
        //Lesson conoce un Level
        return $this->belongsTo(Level::class);
    }
}
