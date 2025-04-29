<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class classe extends Model
{

    protected $fillable = [
        'brand_id',
        'name',

    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function motormodels(): HasMany
    {
        return $this->hasMany(MotorModel::class);
    }
}
