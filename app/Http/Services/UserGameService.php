<?php

namespace App\Http\Services;

use App\Http\Services\BaseService;

use App\Http\Services\GameService;
use App\GameMode;
use App\GameType;

class UserGameService extends BaseService
{
    private $game_service;

    public function __construct(GameService $gameService)
    {
        $this->game_service = $gameService;
    }

    public function get($user, $game_token)
    {

    }

    public function start($user, $mode, $type)
    {
        $game = $this->game_service->start($mode, $type);

        return $game;
    }

    public function move($user, $game_token)
    {

    }

    public function reset($user, $game_token)
    {

    }

    public function load($user, $game_token)
    {

    }
}