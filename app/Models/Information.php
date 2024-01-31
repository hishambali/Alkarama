<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'title',
        'content',
        'reads',
        'image',
        'type',
       /*  'information_able_type',
        'information_able_id', */
        
    ];
}
