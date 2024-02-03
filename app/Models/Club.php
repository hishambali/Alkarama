<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'name',
        'logo',
        'address',
        'sport_id',

    ];
    public function sport():BelongsTo{
        return $this->BelongsTo(Sport::class);

    }
    public function standing():HasMany
    {
        return $this->hasMany(Standings::class);
    }

}
