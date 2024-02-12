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
    public function employees():object{
        return $this->hasMany(Employee::class);
    }
    public function primes(): object{
        return $this->hasMany(Prime::class);
    }
    public function clubs(): object{
        return $this->hasMany(Club::class);
    }
    public function players(): object{
        return $this->hasMany(Player::class);
    }
    public function associations(): object{
        return $this->hasMany(association::class);
    }
    public function clothes():object {
        return $this->hasOne(Clothes::class);
    }

}
