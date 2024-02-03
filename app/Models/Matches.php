<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'when',
        'status',
        'plan',
        'channel',
        'round',
        'play_ground',
        'seasone_id',
        'club1_id',
        'club2_id',

    ];
    public function seasone():BelongsTo {
        return $this->belongsTo(Seasone::class);
    }
    // public function club() {
    //     return $this->belongsTo(Club::class);
    // }
    public function replacments():HasMany
    {
        return $this->hasMany(Replacment::class);
    }
    public function palns():HasMany
    {
        return $this->hasMany(Plan::class);
    }
    public function statistics():HasMany
    {
        return $this->hasMany(Statistic::class);
    }

}
