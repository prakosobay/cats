<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Food extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'foods';
    protected $fillable = [
        'name',
    ];


}
