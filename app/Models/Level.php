<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Level extends Model
{
    use HasFactory;


    protected $guarded = [


    ];
    //defino la relacion


    public function Lessons():HasMany{
        //Level no define la relacion, no conoce la clave foranea
        // no tiene clave foranea entonces , hasMany
        // tiene clave foranea entonces , belongsHasMany
        return $this->hasMany(Lesson::class);
    }
}
