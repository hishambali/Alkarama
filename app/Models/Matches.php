<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Matches extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'when',
        'status',
        'plan',
        'channel',
        'round',
        'play_ground',
        'seasone_id',
        'club1_id',
        'club2_id',

    ];
    public function Seasone():object {
        return $this->BelongsTo(Seasone::class);
    }
    public function Club() {
        return $this->BelongsTo(Club::class);
    }
    public function Replacments():object
    {
        return $this->HasMany(Replacment::class);
    }
    public function Palns():object
    {
        return $this->HasMany(Plan::class);
    }
    public function Statistics():object
    {
        return $this->HasMany(Statistic::class);
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
