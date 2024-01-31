<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'name',
        'job_type',
        'work',
        'sport_id',
        
    ];
    public function sport(){
        return $this->BelongsTo(Sport::class); 

    }
}
