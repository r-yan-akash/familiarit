<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable=[
        'title',
        'mobile',
        'email',
        'description',
        'document',
        'reference1',
        'reference2',
        'reference3'
    ];
}
