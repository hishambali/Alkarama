<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopFan extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'name',
        'association_id',
    ];


    public function Associations():object
    {
        return $this->BelongsTo(Association::class);
    }
}
