<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'name',
        'value',
        'match_id',
        
    ];
    public function match(){
        return $this->BelongsTo(Matches::class); 

    }
}
