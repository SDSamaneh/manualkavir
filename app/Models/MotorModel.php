<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class MotorModel extends Model
{
    protected $table = 'motormodels';

    protected $fillable = [
        'brand_id',
        'classe_id',
        'name',

    ];


    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function classe(): BelongsTo
    {
        return $this->belongsTo(Classe::class);
    }
   
    public function manuals(): HasMany
    {
        return $this->hasMany(Manual::class, 'motormodel_id');
    }
}
