<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [


    ];

    //defino la relacion
    public function lessons():BelongsToMany{
        return $this->belongsToMany(Lesson::class);
    }


    public function id():int {
        return $this->id();
    }
}
