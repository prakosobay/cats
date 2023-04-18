<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class MasterType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'master_types';
    protected $fillable = [
        'name',
    ];

    public function cats()
    {
        return $this->hasMany(Cat::class, 'type_id');
    }
}
