<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seasone extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'name',
        'start_date',
        'end_date'
    ];
}
public function prime():HasMany
{
    return $this->hasMany(Prime::class);
}
public function standings():HasMany
{
    return $this->hasMany(Standings::class);
}
public function clothes():HasOne
{
    return $this->hasOne(Clothes::class);
}
public function matches():HasMany
{
    return $this->hasMany(Matches::class);
}
