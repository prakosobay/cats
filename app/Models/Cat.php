<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Cat extends Model
{
    use HasFactory;

    protected $table = 'cats';
    protected $fillable = [
        'name',
        'gender',
        'type_id',
        'color',
        'food',
    ];

    public function typeId()
    {
        return $this->belongsTo(MasterType::class, 'type_id');
    }
}
