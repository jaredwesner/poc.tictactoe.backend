<?php

namespace App\Http\Services;

use App\Http\Services\BaseService;
use App\GameMode;
use App\GameType;
use App\PlayerType;
use App\Game;

class GameService extends BaseService
{
    public function __construct()
    {

    }

    public function start($mode = GameMode::VERSUS_COM, $type = GameType::REGULAR)
    {
        $game = self::createNewGame($mode, $type);

        self::preformDefaultMove($mode);

        return $game;
    }

    public function getDefaultGameState()
    {
       return self::defaultGameState();
    } 

    // TODO:: Create smart first move
    public function comMoveDefault($game_state, $player_type)
    {
        $col = rand(0,2);
        $row = rand(0,2);

        $game_state[$row][$col] = self::returnOppPlayerChar($player_type);
        return $game_state;
    }

    private function preformDefaultMove($mode)
    {
        if($mode != GameMode::VERSUS_COM) { return; }
        // TODO:: make move
    }

    private function createNewGame($mode, $type)
    {
        // can use Game::create([]);
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

    private function returnOppPlayerChar($current_player_type)
    {
        if ($current_player_type == PlayerType::CROSS) 
        {
            return 'O';
        }
        return  'X';
    }

    private function returnPlayerChar($player_type)
    {
        if ($player_type == PlayerType::CROSS) 
        {
            return 'X';
        }
        return  'O';
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

    // TODO:: break out into board class
    private function defaultGameState()
    {
        return array([null, null, null], [null , null, null], [null , null, null]);
    }
}