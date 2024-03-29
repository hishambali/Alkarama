<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clothes extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'image',
        'seasone_id',
        'sport_id',

    ];
    public function Seasone():object {
        return $this->BelongsTo(Seasone::class);
    }
     public function Sport():object{
         return $this->BelongsTo(Sport::class);
     }
}
