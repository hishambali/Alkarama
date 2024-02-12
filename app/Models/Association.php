<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    public function sport():BelongsTo
    {
         return $this->BelongsTo(Sport::class);
    }
    public function topFan():BelongsTo
    {
         return $this->BelongsTo(TopFan::class);
    }
   
    public function setBossAttribute($value)
    {
        $this->attributes['boss'] = str_replace(' ', '_', $value);
    }

}
