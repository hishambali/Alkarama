<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'status',
        'player_id',
        'match_id',
        
    ];
    public function Match():object{
        return $this->BelongsTo(Matches::class); 

    }
    public function Player():object{
        return $this->BelongsTo(Player::class); 

    }
}
