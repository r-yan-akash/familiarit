<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable=[
        'day',
        'contact_1',
        'contact_2',
        'email_1',
        'email_2',
        'address',
        'meta',
        'google_analytics',
        'fb_id',
        'pinterest',
        'instagram'
        ];
}
