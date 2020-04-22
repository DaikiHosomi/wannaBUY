<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailReset extends Model
{
    protected $fillable = [
        'user_id',
        'new_email',
        'token',
    ];
}
