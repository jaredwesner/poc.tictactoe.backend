<?php

namespace App\Http\Services;

// this should be game service exceptions
use App\Exceptions\ValidationException;

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

    // TODO:: Create smart first move - basic move to get system completed
    public function comMoveDefault($game_state, $player_type)
    {
        $game_state[rand(0,2)][rand(0,2)] = self::returnOppPlayerChar($player_type);
        return $game_state;
    }

    // TODO:: AI using MinMax algorithm
    public function comMove($game_state)
    {
        // initial dumb move
        $move = [rand(0,2), rand(0,2)];

        while($game_state[$move[0]][$move[1]] != null)
        {
            $move = [rand(0,2), rand(0,2)];
        }

        return $move;
    }

    public function makeMove($user_game, $move)
    {
        $user_game_state = $user_game->game_state;
       
        // check if the move is valid
        self::checkMoveIsValid($user_game_state, $move);

        // make move
        $user_game_state[$move[0]][$move[1]] = self::returnPlayerChar($user_game->player_type);
        $user_game->game_state = $user_game_state; 
        
        if($user_game->game->mode == GameMode::VERSUS_COM) 
        {
            // get computer move
            $com_move = self::comMove($user_game_state);
            $user_game_state[$com_move[0]][$com_move[1]] = self::returnOppPlayerChar($user_game->player_type);
            $user_game->game_state = $user_game_state; 
        }

        $user_game->save();

        return $user_game;
    }
    
    private function checkMoveIsValid($game_state, $move)
    {
        if($game_state[$move[0]][$move[1]] != null)
        {
            throw new ValidationException(null, 'Invalid Move', 404);
        }
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