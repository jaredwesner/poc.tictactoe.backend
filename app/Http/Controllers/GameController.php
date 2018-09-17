<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\ValidationException;
use App\Http\Services\GameService;
use App\Http\Responses\StandardResponse;

class GameController extends Controller
{
    private $game_service;

    public function __construct(GameService $gameService) {
        $this->game_service = $gameService;
    }

    public function get($game_token)
    {
        $user = Auth::user();
        $game = $this->game_service->get($user, $game_token);
        return new StandardResponse($game);
    }

    public function start($game_token)
    {

    }

    public function move($game_token)
    {

    }

    public function reset($game_token)
    {

    }

    public function load($game_token)
    {

    }
}