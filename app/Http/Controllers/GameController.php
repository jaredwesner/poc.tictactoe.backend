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
}