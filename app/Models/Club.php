<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;


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
    public function Sport():object{
        return $this->BelongsTo(Sport::class);

    }
    public function Standing():object
    {
        return $this->HasMany(Standings::class);
    }
    public function Matches():object
    {
        return $this->HasMany(Matches::class);
    }

    public function Information() : MorphMany
    {
        return $this->morphMany(Information::class,'information_able');
    }

    public function Videos() : MorphMany
    {
        return $this->morphMany(Video::class,'video_able');
    }

}
