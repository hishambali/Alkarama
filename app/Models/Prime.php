<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prime extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'name',
        'description',
        'image',
        'type',
        'seasone_id',
        'sport_id',
    ];
    public function sport():BelongsTo{
        return $this->BelongsToMany(Sport::class);

    }
    public function seasone():BelongsTo
    {
        return $this->belongsToMany(Seasone::class);
    }
}
