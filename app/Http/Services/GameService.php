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

    public function start($mode = GameMode::VERSUS_COM, $type = GameType::REGULAR)
    {
        $game = self::createNewGame($mode, $type);

        // check for default move?

        return $game;
    }

    // can use Game::create([]);
    private function createNewGame($mode, $type)
    {
        $game = new Game();
        $game->external_id = self::createUUID();
        $game->board_size = 3;
        $game->mode = $mode;
        $game->type = $type;
        $game->save();
        return $game;
    }

    private function createUUID()
    {
        return (string) \Uuid::generate();
    }

    private function gameMode($mode)
    {
        switch ($mode) {
            case GameMode::VERSUS_COM:
                    # code...
                 break;
            case GameMode::VERSUS_HUMAN:
                    # code...
                break;
            default:
                    # code...
                break;
        }
    }
}