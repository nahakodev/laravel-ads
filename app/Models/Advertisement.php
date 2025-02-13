<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'id',
        'title',
        'description',
        'user_id',
        'price',
    ];

    protected $table = 'advertisements';
}
