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
    public function seasone():object {
        return $this->belongsTo(Seasone::class);
    }
    // public function club() {
    //     return $this->belongsTo(Club::class);
    // }
    public function replacments():object
    {
        return $this->hasMany(Replacment::class);
    }
    public function palns():object
    {
        return $this->hasMany(Plan::class);
    }
    public function statistics():object
    {
        return $this->hasMany(Statistic::class);
    }

}
