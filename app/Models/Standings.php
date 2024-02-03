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
    public function seasones() {
        return $this->belongsTo(Seasone::class);
    }
    public function clubs(){
        return $this->belongsToMany(Club::class);
    }

}
