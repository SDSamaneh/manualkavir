<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{

    protected $fillable = [
        'author_id',
        'name',
        'slug',
        'thumbnail'

    ];



    public function classes(): HasMany
    {
        return $this->hasMany(classe::class);
    }


    public function motormodels(): HasMany
    {
        return $this->hasMany(MotorModel::class);
    }
}
