<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;


class Sport extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'uuid',

    ];

    public function Employees():object{
        return $this->HasMany(Employee::class);
    }
    public function Primes(): object{
        return $this->HasMany(Prime::class);
    }
    public function Clubs(): object{
        return $this->HasMany(Club::class);
    }
    public function Players(): object{
        return $this->HasMany(Player::class);
    }
    public function Associations(): object{
        return $this->HasMany(Association::class);
    }
    public function Clothes(): object{
        return $this->HasMany(Clothes::class);
    }
    public function Information() : MorphMany{
        return $this->morphMany(Information::class,'information_able');
    }

}
