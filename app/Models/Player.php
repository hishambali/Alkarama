<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'name',
        'high',
        'play',
        'number',
        'born',
        'from',
        'first_club',
        'career',
        'image',
        'sport_id',
    ];
    public function sport():object
    {
        return $this->belongsTo(Sport::class);
    }
    public function replacments():object
    {
        return $this->hasMany(Replacment::class);
    }
    public function plans():object
    {
        return $this->hasMany(Plan::class);

    }
}
