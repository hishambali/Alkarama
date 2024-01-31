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
    public function seasone() {
        return $this->belongsTo(Seasone::class);
    }
    public function club() {
        return $this->belongsToMany(Club::class);
    }
}
