<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Manual extends Model
{
    protected $fillable = [
        'brand_id',
        'classe_id',
        'motormodel_id',
        'title',
        'slug',
        'year',
        'urlkavir',
        'urlother',
        'urlnetwork',
        'fileCoc',
        'userGuideFa',
        'userGuideEn',
        'repairGuideFa',
        'repairGuideEn',
        'partsGuide',
        'pdi',
        'periodicService',
        'Bulletin1',
        'Bulletin2',
        'Bulletin3',
        'Bulletins',

    ];



    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function classe(): BelongsTo
    {
        return $this->belongsTo(Classe::class);
    }

    public function motormodel(): BelongsTo
    {
        return $this->belongsTo(MotorModel::class, 'motormodel_id');
    }
}
