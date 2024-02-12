<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Seasone extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'name',
        'start_date',
        'end_date'
    ];

    public function Prime():object
    {
        return $this->HasMany(Prime::class);
    }
    public function Standings():object
    {
        return $this->HasMany(Standings::class);
    }
    public function Clothes():object
    {
        return $this->HasOne(Clothes::class);
    }
    public function Matches():object
    {
        return $this->HasMany(Matches::class);
    }

    public function Information() : MorphMany
    {
        return $this->morphMany(Information::class,'information_able');
    }
    
}