<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replacment extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'inplayer_id',
        'outplayer_id',
        'match_id',
    ];
    public function match():object
    {
        return $this->BelongsTo(Matches::class);

    }
    public function player():object
    {
        return $this->belongsToMany(Player::class);

    }

}
