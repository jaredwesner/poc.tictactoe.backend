<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
       
    ];

    protected $hidden = [
        'id', 'created_at', 'updated_at'
    ];
}