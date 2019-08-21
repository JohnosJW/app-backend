<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Http\Resources\Game as GameResource;

class GameController extends Controller
{
    /**
     * @var Game
     */
    private $game;

    /**
     * GameController constructor.
     * @param Game $game
     */
    public function __construct(Game $game)
    {
        $this->game = $game;
    }

    /**
     * @return GameResource
     */
    public function getBonus() : GameResource
    {
        return new GameResource($this->game->getRandBonus());
    }
}
