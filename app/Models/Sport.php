<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'uuid',

    ];
    // public function association() {
    //     return $this->belongsTo(Association::class);
    // }
    public function employees(): HasMany{
        return $this->hasMany(Employee::class);
    }
    public function primes(): HasMany{
        return $this->hasMany(Prime::class);
    }
    public function clubs(): HasMany{
        return $this->hasMany(Club::class);
    }
    public function players(): HasMany{
        return $this->hasMany(Player::class);
    }
    public function associations(): HasMany{
        return $this->hasMany(association::class);
    }

}
