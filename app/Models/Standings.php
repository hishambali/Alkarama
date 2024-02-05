<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standings extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'win',
        'diff',
        'lose',
        'draw',
        'play',
        'point',
        'seasone_id',
        'club_id',

    ];
    public function seasones():object {
        return $this->belongsTo(Seasone::class);
    }
    public function clubs():object{
        return $this->belongsToMany(Club::class);
    }

}
