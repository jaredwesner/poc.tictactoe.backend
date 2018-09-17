<?php

namespace App\Http\Services;

use App\Http\Services\BaseService;
use App\GameMode;
use App\GameType;
use App\Game;

class GameService extends BaseService
{
    public function __construct()
    {

    }

    public function start($user_id, $mode = GameMode::VERSUS_COM, $type = GameType::REGULAR)
    {

    }
}