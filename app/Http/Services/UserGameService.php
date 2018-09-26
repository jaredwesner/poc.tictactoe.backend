<?php

namespace App\Http\Services;

use App\Http\Services\BaseService;
use App\Exceptions\ValidationException;
use App\Http\Services\GameService;
use App\GameMode;
use App\GameType;
use App\GameStatus;
use App\PlayerType;
use App\UserGame;

class UserGameService extends BaseService
{
    private $game_service;

    public function __construct(GameService $gameService)
    {
        $this->game_service = $gameService;
    }

    public function list($user)
    {
        $user_games = UserGame::where('user_id', $user->id)->get();

        if($user_games->isEmpty())
        {
            throw new ValidationException(null, 'No games found', 404);
        }

        return $user_games;
    }

    public function get($user, $game_id)
    {        
        $user_game = UserGame::where('game_id', $game_id)->where('user_id', $user->id)->first();

        if(!$user_game)
        {
            throw new ValidationException(null, 'No game found with that id', 404);
        }

        $user_game->load('game');

        return $user_game;
    }

    public function start($user, $mode, $type)
    {
        $game = $this->game_service->start($mode, $type);

        $user_game = self::newUserGame($user->id, $game->id);

        $user_game->game_state = $this->game_service->comMoveDefault(
            $user_game->game_state, 
            $user_game->player_type
        );
        
        $user_game->save();

        return $user_game;
    }

    public function move($user, $game_id, $move)
    {        
        $user_game = self::get($user, $game_id);

        if($user_game->game_status != GameStatus::IN_PROGRESS)
        {
            throw new ValidationException(null, 'Game Status: '.$user_game->game_status, 422);
        }

        $user_game = $this->game_service->makeMove($user_game, $move);

        return $user_game;
    }

    public function reset($user, $game_id)
    {

    }

    public function load($user, $game_id)
    {

    }

    private function newUserGame($user_id, $game_id, $player_type = PlayerType::CROSS, $vs_user_id = null)
    {
        $user_game = new UserGame();
        $user_game->user_id = $user_id; 
        $user_game->vs_user_id = $vs_user_id; 
        $user_game->game_id = $game_id; 
        $user_game->player_type = $player_type; 
        $user_game->game_status = GameStatus::IN_PROGRESS; 
        $user_game->game_state = $this->game_service->getDefaultGameState();
        $user_game->save();
        return $user_game;
    }
}