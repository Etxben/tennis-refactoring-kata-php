<?php

class TennisGame1 implements TennisGame
{
    private const ALL = self::SEPARATOR . "All";
    private const DEUCE = "Deuce";
    private const WIN_FOR = "Win for ";
    private const ADVANTAGE = "Advantage ";
    const SEPARATOR = '-';

    private TennisPlayer $playerOne;
    private TennisPlayer $playerTwo;

    public function __construct($player1Name, $player2Name)
    {
        $this->playerOne = new TennisPlayer($player1Name);
        $this->playerTwo = new TennisPlayer($player2Name);
    }

    public function wonPoint($playerName) : void
    {
        if ($this->playerOne->name == $playerName)
        {
            $this->playerOne->addOneToScore();
        }
        else
        {
            $this->playerTwo->addOneToScore();
        }
    }

    public function getScore() : string
    {
        if ($this->playerOne->AreTied($this->playerTwo))
        {
            if ($this->playerOne->isScoreForty())
            {
                return self::DEUCE;
            }
            return $this->playerOne->getScoreAsString() .
                self::ALL;
        }

        if ($this->hasAnyPlayerAScoreMoreThanForty())
        {

            if ($this->playerOne->hasAdvantage($this->playerTwo))
            {
                return self::ADVANTAGE . $this->playerOne->name;
            }
            if ($this->playerTwo->hasAdvantage($this->playerOne))
            {
                return self::ADVANTAGE . $this->playerTwo->name;
            }

            if ($this->playerOne->winTheSet($this->playerTwo))
            {
                return self::WIN_FOR . $this->playerOne->name;
            }

            if ($this->playerTwo->winTheSet($this->playerOne))
            {
                return self::WIN_FOR . $this->playerTwo->name;
            }
        }

        return
            $this->playerOne->getScoreAsString() .
            self::SEPARATOR .
            $this->playerTwo->getScoreAsString();
    }

    private function hasAnyPlayerAScoreMoreThanForty(): bool
    {
        return
            $this->playerOne->isScoreMoreThanForty() ||
            $this->playerTwo->isScoreMoreThanForty();
    }
}
