<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'uuid',
        
    ];
    public function association() {
        return $this->belongsTo(Association::class);
    }
}
