<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\ValidationException;
use App\Http\Services\UserGameService;
use App\Http\Responses\StandardResponse;

class UserGameController extends Controller
{
    private $user_game_service;

    public function __construct(UserGameService $userGameService) {
        $this->user_game_service = $userGameService;
    }

    public function get($game_token)
    {
        $user = Auth::user();

        $game = $this->user_game_service->get($user, $game_token);

        return new StandardResponse($game);
    }

    public function start(Request $request, $game_token)
    {
        $user = Auth::user();

        $game = $this->user_game_service->get($user, $game_token);

        return new StandardResponse($game);
    }

    public function move(Request $request, $game_token)
    {
        $user = Auth::user();

        $game = $this->user_game_service->get($user, $game_token);

        return new StandardResponse($game);
    }

    public function reset($game_token)
    {
        $user = Auth::user();

        $game = $this->user_game_service->get($user, $game_token);

        return new StandardResponse($game);
    }

    public function load($game_token)
    {
        $user = Auth::user();

        $game = $this->user_game_service->get($user, $game_token);

        return new StandardResponse($game);
    }
}
