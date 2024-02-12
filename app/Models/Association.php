<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Association extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'boss',
        'image',
        'description',
        'country',
        'sport_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    public function Sport():object
    {
         return $this->BelongsTo(Sport::class);
    }
    public function TopFan():object
    {
         return $this->hasOne(TopFan::class);
    }

    public function Videos() : MorphMany
    {
        return $this->morphMany(Video::class,'video_able');
    }

}
