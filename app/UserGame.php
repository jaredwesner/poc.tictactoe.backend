<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGame extends Model
{
    protected $fillable = [
        'user_id', 'vs_user_id', 'game_id', 'player_type', 'game_status', 'status_updated_at'

    ];

    protected $hidden = [
        'id', 'created_at', 'updated_at', 'user_id', 'vs_user_id', 'status_updated_at'
    ];

    protected $casts = [
        'game_state' => 'json'
    ];

    public function game()
    {
        return $this->hasOne('App\Game', 'id', 'game_id');
    }
}